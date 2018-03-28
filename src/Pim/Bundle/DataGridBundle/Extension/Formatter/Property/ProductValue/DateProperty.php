<?php

namespace Pim\Bundle\DataGridBundle\Extension\Formatter\Property\ProductValue;

use Akeneo\Component\Localization\Presenter\PresenterInterface;
use Oro\Bundle\DataGridBundle\Datasource\ResultRecordInterface;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Able to render date value
 *
 * @author    Nicolas Dupont <nicolas@akeneo.com>
 * @copyright 2013 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class DateProperty extends FieldProperty
{
    /** @var PresenterInterface */
    protected $presenter;

    /**
     * @param TranslatorInterface $translator
     * @param PresenterInterface  $presenter
     */
    public function __construct(TranslatorInterface $translator, PresenterInterface $presenter)
    {
        parent::__construct($translator);

        $this->presenter = $presenter;
    }

    /**
     * {@inheritdoc}
     */
    protected function convertValue($value)
    {
        $result = !$value instanceof \DateTime ? $this->getBackendData($value) : $value;

        return $this->presenter->present($result, ['locale' => $this->translator->getLocale()]);
    }
}
