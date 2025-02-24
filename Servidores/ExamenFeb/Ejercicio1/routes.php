<?php
require_once 'config/database.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/PatientController.php';
require_once 'controllers/AppointmentController.php';
require_once 'controllers/ServiceController.php';
require_once 'controllers/AdminController.php';

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    //autenticación
    case '/register':
        (new AuthController())->register();
        break;
    case '/confirm-email':
        (new AuthController())->confirmEmail();
        break;
    case '/login':
        (new AuthController())->login();
        break;
    case '/logout':
        (new AuthController())->logout();
        break;

    //pacientes
    case '/dashboard':
        (new PatientController())->dashboard();
        break;
    case '/profile':
        (new PatientController())->profile();
        break;

    //consultas
    case '/specialties':
        (new ServiceController())->listSpecialties();
        break;
    case '/doctors':
        (new ServiceController())->listDoctors();
        break;
    case '/services':
        (new ServiceController())->listServices();
        break;

    //reservas
    case '/book-appointment':
        (new AppointmentController())->book();
        break;
    case '/confirm-appointment':
        (new AppointmentController())->confirm();
        break;
    case '/download-appointment':
        (new AppointmentController())->downloadPDF();
        break;

    //administracion
    case '/admin/manage-doctors':
        (new AdminController())->manageDoctors();
        break;
    case '/admin/manage-appointments':
        (new AdminController())->manageAppointments();
        break;
    case '/admin/manage-services':
        (new AdminController())->manageServices();
        break;

    default:
        http_response_code(404);
        echo "Página no encontrada";
        break;
}
?>
