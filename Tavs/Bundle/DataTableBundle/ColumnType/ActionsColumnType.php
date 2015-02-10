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
            'edit_class' => 'btn btn-default btn-sm',
            'edit_icon' => 'fa fa-edit',
            'remove_label' => null,
            'remove_route' => null,
            'remove_class' => 'btn btn-default btn-sm',
            'remove_icon' => 'fa fa-trash-o',
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
            'edit_class' => $options['edit_class'],
            'edit_icon' => $options['edit_icon'],
            'remove_route' => $options['remove_route'],
            'remove_label' => $options['remove_label'],
            'remove_class' => $options['remove_class'],
            'remove_icon' => $options['remove_icon'],
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