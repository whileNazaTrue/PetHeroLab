<?php
namespace Controllers;
use Models\Guardian as Guardian;
use DAO\duenioDAO as duenioDAO;
use DAO\guardianDAO as guardianDAO;
use Utils\Session;

class GuardianController{

    private $duenioDAO;
    private $guardianDAO;
    private $authController;

    public function __construct()
    {
        $this->duenioDAO = new duenioDAO();
        $this->guardianDAO = new guardianDAO();
        $this->authController = new AuthController();
    }

    public function registerGuardian($fullname, $age, $dni, $email, $password,$tipoMascota,$remuneracionEsperada)
    {
        $user = new Guardian($email, $fullname, $dni, $age, $password,$tipoMascota,$remuneracionEsperada,$diponibilidad=array(),$initDate=null,$finishDate=null);
        if($this->guardianDAO->getGuardianByEmail($email) == null)
        {
            $this->guardianDAO->addGuardian($user);
            $this->authController->showLogin("Guardian registrado con exito");
        }else{
            $this->authController->showLogin("El email ya esta en uso");
        }
    }

    public function checkingDates($startingDay, $finishDate, $daysToWork){
        while($startingDay <= $finishDate){
            $string = $this->dayName($startingDay);
            foreach($daysToWork as $day){
                if($string===$day){
                    return true;
                }
            } 
            $startingDay = date('Y-m-d', strtotime($startingDay)+86400);  
        } 
    }

    public function dayName($startingDay){
        $fechats = strtotime($startingDay);
        switch (date('w', $fechats)){
            case 0: return "domingo"; break;
            case 1: return "lunes"; break;
            case 2: return "martes"; break;
            case 3: return "miercoles"; break;
            case 4: return "jueves"; break;
            case 5: return "viernes"; break;
            case 6: return "sabado"; break;
            }  
    }

    public function showdisponibilityView ($guardianname){
       
        $guardian = $this->guardianDAO->getGuardianByEmail($guardianname);
        require_once (VIEWS_PATH."guardian-disponibilidad.php");
    }

    public function ModifyAvailability($guardianname,$initDate, $finishDate, $daysToWork){   
        $boolean = $this->checkingDates($initDate, $finishDate, $daysToWork);
        if($boolean){
            $this->guardianDAO->updateGuardianDiponibility ($guardianname,$initDate, $finishDate, $daysToWork);
            require_once (VIEWS_PATH."guardian-profile.php");
        } else{
            Session::SetMessage("No se puede modificar la disponibilidad");
            require_once (VIEWS_PATH."guardian-disponibilidad.php");
        }
    }
}
?>