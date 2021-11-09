<?php

namespace App\Controller\Admin;

use App\Entity\Customer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Sf5PiComBack');
    }

    public function configureMenuItems(): iterable
    {
	    return[
	    MenuItem::linktoDashboard('Dashboard', 'fa fa-home'),
	    MenuItem::section('Utilisateurs'),
	    MenuItem::linkToCrud('Clients', 'fas fa-user', Customer::class),
	    ];
    }
}
