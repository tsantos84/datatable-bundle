<?php

namespace Tavs\Bundle\DataTableBundle\ColumnType;

use Tavs\DataTable\ColumnType\AbstractColumnType;
use Tavs\DataTable\ColumnView;
use Tavs\DataTable\DataTableView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class ActionsColumnType
 * @package Tavs\Bundle\DataTableBundle\DataTable\ColumnType
 */
class ActionsColumnType extends AbstractColumnType
{
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'block_name' => 'column_actions',
            'mapped' => false,
            'title' => 'Ações',
            'edit_label' => '',
            'edit_route' => null,
            'remove_label' => null,
            'remove_route' => null,
            'align' => 'center'
        ));
    }

    /**
     * @inheritdoc
     */
    public function buildView(ColumnView $view, DataTableView $dataTableView, array $options)
    {
        $view->vars = array_merge($view->vars, array(
            'edit_route' => $options['edit_route'],
            'edit_label' => $options['edit_label'],
            'remove_route' => $options['remove_route'],
            'remove_label' => $options['remove_label'],
        ));
    }

    /**
     * @inheritdoc
     */
    public function getParent()
    {
        return 'text';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'actions';
    }
}