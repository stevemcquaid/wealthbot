<?php
/**
 * Created by JetBrains PhpStorm.
 * User: amalyuhin
 * Date: 13.02.13
 * Time: 13:16
 * To change this template use File | Settings | File Templates.
 */

namespace Wealthbot\ClientBundle\Model;


class TransferInformation
{
    /**
     * @var string
     */
    protected $account_type;

    // ENUM values account_type column
    const ACCOUNT_TYPE_PERSONAL_INVESTMENT_ACCOUNT = 'Personal Investment Account';
    const ACCOUNT_TYPE_JOINT_ACCOUNT = 'Joint Account';
    const ACCOUNT_TYPE_ROTH_IRA = 'Roth IRA';
    const ACCOUNT_TYPE_TRADITIONAL_ROLLOVER_IRA = 'Traditional/Rollover IRA';

    static private $_accountTypeValues = null;

    /**
     * @var integer
     */
    protected $transfer_from;

    const TRANSFER_FROM_BROKERAGE_FIRM = 1;
    const TRANSFER_FROM_MUTUAL_FUND_COMPANY = 2;
    const TRANSFER_FROM_BANK = 3;
    const TRANSFER_FROM_DEPOSIT_CERTIFICATES = 4;

    static private $_transferFromValues = array(
        self::TRANSFER_FROM_BROKERAGE_FIRM => 'Transfer from a brokerage firm',
        self::TRANSFER_FROM_MUTUAL_FUND_COMPANY => 'Transfer from a Mutual Fund Company',
        self::TRANSFER_FROM_BANK => 'Transfer from a Bank, Insurance/Annuity Co, Trust Co, or Transfer Agent',
        self::TRANSFER_FROM_DEPOSIT_CERTIFICATES => 'Certificates of Deposit (CD’s)'
    );

    /**
     * @var integer
     */
    protected $insurance_policy_type;

    const INSURANCE_POLICY_TYPE_TERMINATE_CONTACT_POLICY = 1;
    const INSURANCE_POLICY_TYPE_TRANSFER_PENALTY_FREE_AMOUNT = 2;
    const INSURANCE_POLICY_TYPE_TRANSFER_PENALTY_FREE = 3;

    static private $_insurancePolicyTypeValues = array(
        self::INSURANCE_POLICY_TYPE_TERMINATE_CONTACT_POLICY => 'I agree to redeem and terminate the entire contract of policy on my behalf. I understand that penalties may apply.',
        self::INSURANCE_POLICY_TYPE_TRANSFER_PENALTY_FREE_AMOUNT => 'Please transfer penalty-free amount only, which is',
        self::INSURANCE_POLICY_TYPE_TRANSFER_PENALTY_FREE => 'Check here if the entire account is penalty free.'
    );


    /**
     * Get array ENUM values account_type column
     *
     * @static
     * @return array
     */
    static public function getAccountTypeChoices()
    {
        // Build $_statusValues if this is the first call
        if (self::$_accountTypeValues == null) {
            self::$_accountTypeValues = array();
            $oClass = new \ReflectionClass('\Wealthbot\ClientBundle\Model\TransferInformation');
            $classConstants = $oClass->getConstants();
            $constantPrefix = "ACCOUNT_TYPE_";
            foreach ($classConstants as $key => $val) {
                if (substr($key, 0, strlen($constantPrefix)) === $constantPrefix) {
                    self::$_accountTypeValues[$val] = $val;
                }
            }
        }

        return self::$_accountTypeValues;
    }

    /**
     * Set account_type
     *
     * @param $accountType
     * @return TransferInformation
     * @throws \InvalidArgumentException
     */
    public function setAccountType($accountType)
    {
        if (!in_array($accountType, self::getAccountTypeChoices())) {
            throw new \InvalidArgumentException(
                sprintf('Invalid value for transfer_information.account_type : %s.', $accountType)
            );
        }

        $this->account_type = $accountType;

        return $this;
    }

    /**
     * Get account_type
     *
     * @return string
     */
    public function getAccountType()
    {
        return $this->account_type;
    }

    /**
     * Get choices for transfer_from column
     *
     * @return array
     */
    static public function getTransferFromChoices()
    {
        return self::$_transferFromValues;
    }

    /**
     * Set transfer_from
     *
     * @param integer|null $transferFrom
     * @return TransferInformation
     * @throws \InvalidArgumentException
     */
    public function setTransferFrom($transferFrom)
    {
        if (!is_null($transferFrom) && !array_key_exists($transferFrom, self::getTransferFromChoices())) {
            throw new \InvalidArgumentException(
                sprintf('Invalid value for transfer_information.transfer_from : %s.', $transferFrom)
            );
        }

        $this->transfer_from = $transferFrom;

        return $this;
    }

    /**
     * Get transfer_from
     *
     * @return integer
     */
    public function getTransferFrom()
    {
        return $this->transfer_from;
    }

    /**
     * Get choices for insurance_policy_type column
     *
     * @return array
     */
    static public function getInsurancePolicyTypeChoices()
    {
        return self::$_insurancePolicyTypeValues;
    }

    /**
     * Set insurance_policy_type
     *
     * @param integer|null $insurancePolicyType
     * @return TransferInformation
     * @throws \InvalidArgumentException
     */
    public function setInsurancePolicyType($insurancePolicyType)
    {
        if (!is_null($insurancePolicyType) && !array_key_exists($insurancePolicyType, self::getInsurancePolicyTypeChoices())) {
            throw new \InvalidArgumentException(
                sprintf('Invalid value for transfer_information.insurance_policy_type : %s.', $insurancePolicyType)
            );
        }

        $this->insurance_policy_type = $insurancePolicyType;

        return $this;
    }

    /**
     * Get insurance_policy_type
     *
     * @return integer
     */
    public function getInsurancePolicyType()
    {
        return $this->insurance_policy_type;
    }

}