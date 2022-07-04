<?php

namespace App\Controller\Admin;

use App\Entity\Device;
use App\Entity\DeviceType;
use App\Entity\Measurement;
use App\Entity\MeasurementType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(DeviceCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Farmer');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'device_index');
        yield MenuItem::linkToCrud('Device', 'fas fa-map-marker-alt', Device::class);
        yield MenuItem::linkToCrud('Device type', 'fas fa-comments', DeviceType::class);
        yield MenuItem::linkToCrud('Measurement type', 'fas fa-comments', MeasurementType::class);
        yield MenuItem::linkToCrud('Measurement', 'fas fa-comments', Measurement::class);
    }
}
