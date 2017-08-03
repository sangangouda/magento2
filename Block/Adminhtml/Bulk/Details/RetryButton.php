<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\AsynchronousOperations\Block\Adminhtml\Bulk\Details;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Retry button configuration provider
 * @since 2.2.0
 */
class RetryButton implements ButtonProviderInterface
{
    /**
     * @var \Magento\AsynchronousOperations\Model\Operation\Details
     * @since 2.2.0
     */
    private $details;

    /**
     * @var \Magento\Framework\App\RequestInterface
     * @since 2.2.0
     */
    private $request;

    /**
     * @var string
     * @since 2.2.0
     */
    private $targetName;

    /**
     * RetryButton constructor.
     *
     * @param \Magento\AsynchronousOperations\Model\Operation\Details $details
     * @param \Magento\Framework\App\RequestInterface $request
     * @param string $targetName
     * @since 2.2.0
     */
    public function __construct(
        \Magento\AsynchronousOperations\Model\Operation\Details $details,
        \Magento\Framework\App\RequestInterface $request,
        $targetName = 'bulk_details_form.bulk_details_form'
    ) {
        $this->details = $details;
        $this->request = $request;
        $this->targetName = $targetName;
    }

    /**
     * {@inheritdoc}
     * @since 2.2.0
     */
    public function getButtonData()
    {
        $uuid = $this->request->getParam('uuid');
        $details = $this->details->getDetails($uuid);
        if ($details['failed_retriable'] === 0) {
            return [];
        }
        return [
            'label' => __('Retry'),
            'class' => 'retry primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
        ];
    }
}
