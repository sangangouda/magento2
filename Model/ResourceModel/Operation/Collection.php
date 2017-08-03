<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\AsynchronousOperations\Model\ResourceModel\Operation;

/**
 * Class Collection
 * @codeCoverageIgnore
 * @since 2.2.0
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define collection item type and corresponding table
     *
     * @return void
     * @since 2.2.0
     */
    protected function _construct()
    {
        $this->_init(
            \Magento\AsynchronousOperations\Model\Operation::class,
            \Magento\AsynchronousOperations\Model\ResourceModel\Operation::class
        );
        $this->setMainTable('magento_operation');
    }
}
