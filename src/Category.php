<?php

declare(strict_types=1);

namespace Upmind\ProvisionProviders\SoftwareLicenses;

use Upmind\ProvisionBase\Provider\BaseCategory;
use Upmind\ProvisionBase\Provider\DataSet\AboutData;
use Upmind\ProvisionProviders\SoftwareLicenses\Data\ChangePackageParams;
use Upmind\ProvisionProviders\SoftwareLicenses\Data\ChangePackageResult;
use Upmind\ProvisionProviders\SoftwareLicenses\Data\CreateParams;
use Upmind\ProvisionProviders\SoftwareLicenses\Data\CreateResult;
use Upmind\ProvisionProviders\SoftwareLicenses\Data\EmptyResult;
use Upmind\ProvisionProviders\SoftwareLicenses\Data\GetUsageParams;
use Upmind\ProvisionProviders\SoftwareLicenses\Data\GetUsageResult;
use Upmind\ProvisionProviders\SoftwareLicenses\Data\ReissueParams;
use Upmind\ProvisionProviders\SoftwareLicenses\Data\ReissueResult;
use Upmind\ProvisionProviders\SoftwareLicenses\Data\RenewParams;
use Upmind\ProvisionProviders\SoftwareLicenses\Data\RenewResult;
use Upmind\ProvisionProviders\SoftwareLicenses\Data\SuspendParams;
use Upmind\ProvisionProviders\SoftwareLicenses\Data\TerminateParams;
use Upmind\ProvisionProviders\SoftwareLicenses\Data\UnsuspendParams;

/**
 * Provision category for various providers of software licenses
 */
abstract class Category extends BaseCategory
{
    public static function aboutCategory(): AboutData
    {
        return AboutData::create()
            ->setName('Software Licenses')
            ->setDescription('Provision category for various providers of software licenses')
            ->setIcon('ticket');
    }

    /**
     * Get usage stats about a license key.
     */
    abstract public function getUsageData(GetUsageParams $params): GetUsageResult;

    /**
     * Create a new license key.
     */
    abstract public function create(CreateParams $params): CreateResult;

    /**
     * Renew an existing license key.
     */
    abstract public function renew(RenewParams $params): RenewResult;

    /**
     * Upgrade or downgrade a software license package.
     */
    abstract public function changePackage(ChangePackageParams $params): ChangePackageResult;

    /**
     * Reissue an existing license key.
     */
    abstract public function reissue(ReissueParams $params): ReissueResult;

    /**
     * Suspend a license key.
     */
    abstract public function suspend(SuspendParams $params): EmptyResult;

    /**
     * Unsuspend a license key.
     */
    abstract public function unsuspend(UnsuspendParams $params): EmptyResult;

    /**
     * Delete a license key.
     */
    abstract public function terminate(TerminateParams $params): EmptyResult;
}
