<?php

namespace Tavs\Bundle\DataTableBundle\ColumnType;

use Tavs\DataTable\ColumnType\AbstractColumnType;
use Tavs\DataTable\ColumnView;
use Tavs\DataTable\DataTableView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class BooleanColumnType
 * @package Tavs\Bundle\DataTableBundle\DataTable\ColumnType
 */
class BooleanColumnType extends AbstractColumnType
{
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'block_name' => 'column_boolean',
            'title' => null,
            'true_class' => 'fa fa-circle',
            'false_class' => 'fa fa-circle-o',
            'align' => 'center'
        ));
    }

    /**
     * @inheritdoc
     */
    public function buildView(ColumnView $view, DataTableView $dataTableView, array $options)
    {
        $view->vars = array_merge($view->vars, array(
            'true_class' => $options['true_class'],
            'false_class' => $options['false_class'],
        ));
    }

    /**
     * @return null|string
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
        return 'boolean';
    }
}