<?php

namespace ExampleBundle\Controller\User;

use ExampleBundle\DataGrid;
use ExampleBundle\Repository;

use Deejff\DataGridBundle\DataGrid\DataGridBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route(service="example.controller.users_list")
 */
class ListController extends Controller
{
    private $dataGridBuilder;
    private $userRepository;

    public function __construct(DataGridBuilder $dataGridBuilder, Repository\User $userRepository)
    {
        $this->dataGridBuilder = $dataGridBuilder;
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @Route("/", name="users_list")
     * @Template("ExampleBundle:User:list.html.twig")
     * @return array
     */
    public function indexAction(Request $request)
    {
        $dataGrid = $this->dataGridBuilder->build(
            $request,
            $this->userRepository->getListQueryBuilder(),
            $this->createForm(DataGrid\User\FilterType::class),
            new DataGrid\User\FilterQueryBuilder()
        );

        return [
            'dataGrid' => $dataGrid
        ];
    }
}
