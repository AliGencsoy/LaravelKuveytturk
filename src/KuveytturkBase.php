<?php

/**
 * Description of KuveytturkBase
 *
 * @author Ali Gençsoy <mail@aligencsoy.com>
 */

namespace AliGencsoy\LaravelKuveytturk;

class KuveytturkBase {
	/**
	 * @var boolean
	 */
	protected $debug;

	/**
	 * @var boolean
	 */
	protected $error;

	/**
	 * @var string
	 */
	protected $apiVersion;

	/**
	 * @var string url
	 */
	protected $okUrl;

	/**
	 * @var string url
	 */
	protected $failUrl;

	/**
	 * @var integer
	 */
	protected $merchantId;

	/**
	 * @var integer
	 */
	protected $customerId;

	/**
	 * @var string
	 */
	protected $username;

	/**
	 * @var string
	 */
	protected $password;

	/**
	 * @var string
	 */
	protected $cardNumber;

	/**
	 * @var integer
	 */
	protected $cardExpireDateYear;

	/**
	 * @var integer
	 */
	protected $cardExpireDateMonth;

	/**
	 * @var integer
	 */
	protected $cardCvv2;

	/**
	 * @var string
	 */
	protected $cardHolderName;

	/**
	 * @var string
	 */
	protected $cardType;

	/**
	 * @var integer
	 */
	protected $batchId;

	/**
	 * @var string
	 */
	protected $transactionType;

	/**
	 * @var integer
	 */
	protected $installmentCount;

	/**
	 * @var integer
	 */
	protected $amount;

	/**
	 * @var integer
	 */
	protected $displayAmount;

	/**
	 * @var integer
	 */
	protected $currencyCode;

	/**
	 * @var string
	 */
	protected $merchantOrderId;

	/**
	 * @var integer
	 */
	protected $transactionSecurity;

	/**
	 * @var string url
	 */
	protected $securePaymentUrl;

	/**
	 * @var string url
	 */
	protected $paymentConfirmationUrl;

	/**
	 * @var string
	 */
	protected $raw;

	/**
	 * @var mixed
	 */
	protected $xml;

	/**
	 * @var mixed
	 */
	protected $md;

	/**
	 * @var mixed
	 */
	protected $hashData;

	/**
	 * @var mixed
	 */
	protected $cancelAmount;

	/**
	 * @var mixed
	 */
	protected $responseCode;

	/**
	 * @var mixed
	 */
	protected $responseMessage;

	/**
	 * @var mixed
	 */
	protected $referenceId;

	/**
	 * @var mixed
	 */
	protected $businessKey;

	/**
	 * @var mixed
	 */
	protected $provisionNumber;

	/**
	 * @var mixed
	 */
	protected $rrn;

	/**
	 * @var mixed
	 */
	protected $stan;

	/**
	 * @var mixed
	 */
	protected $orderId;

	/**
	 * @param mixed $debug
	 *
	 * @return self
	 */
	public function setDebug($debug) {
		$this->debug = boolval($debug);

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDebug() {
		if(is_null($this->debug)) {
			$data = env('KUVEYTTURK_DEBUG', null);

			if($data === null) { $data = true; }

			$this->setDebug($data);
		}

		return $this->debug;
	}

	/**
	 * @param mixed $error
	 *
	 * @return self
	 */
	public function setError($error) {
		$this->error = $error;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getError() {
		return $this->error;
	}

	/**
	 * Alias for getDebug function
	 *
	 * @return mixed
	 */
	public function isDebug() {
		return $this->getDebug();
	}

	/**
	 * @param mixed $apiVersion
	 *
	 * @return self
	 */
	public function setApiVersion($apiVersion) {
		$this->apiVersion = $apiVersion;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getApiVersion() {
		if(is_null($this->apiVersion)) {
			$data = env('KUVEYTTURK_API_VERSION', false) ? env('KUVEYTTURK_API_VERSION') : '1.0.0';
			$this->setApiVersion($data);
		}

		return $this->apiVersion;
	}

	/**
	 * @param mixed $okUrl
	 *
	 * @return self
	 */
	public function setOkUrl($okUrl) {
		if(!is_null($okUrl)) {
			if(filter_var($okUrl, FILTER_VALIDATE_URL) === false) {
				throw new Exception('LaravelKuveytturk invalid okUrl');
				//dd('LaravelKuveytturk invalid okUrl');
			}
		} else {
			$okUrl = '';
		}

		$this->okUrl = $okUrl;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getOkUrl() {
		if(is_null($this->okUrl)) {
			$data = env('KUVEYTTURK_OK_URL', false);

			if($data === false) {
				throw new Exception('LaravelKuveytturk okUrl doesn\'t set');
				//dd('LaravelKuveytturk okUrl doesn\'t set');
			}

			$this->setOkUrl($data);
		}

		return $this->okUrl;
	}

	/**
	 * @param mixed $failUrl
	 *
	 * @return self
	 */
	public function setFailUrl($failUrl) {
		if(!is_null($failUrl)) {
			if(filter_var($failUrl, FILTER_VALIDATE_URL) === false) {
				throw new Exception('LaravelKuveytturk invalid failUrl');
				//dd('LaravelKuveytturk invalid failUrl');
			}
		} else {
			$failUrl = '';
		}

		$this->failUrl = $failUrl;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getFailUrl() {
		if(is_null($this->failUrl)) {
			$data = env('KUVEYTTURK_FAIL_URL', false);

			if($data === false) {
				throw new Exception('LaravelKuveytturk failUrl doesn\'t set');
				// dd('LaravelKuveytturk failUrl doesn\'t set');
			}

			$this->setFailUrl($data);
		}

		return $this->failUrl;
	}

	/**
	 * @param mixed $merchantId
	 *
	 * @return self
	 */
	public function setMerchantId($merchantId) {
		$merchantId = intval($merchantId);

		$this->merchantId = $merchantId;

		return $this;
	}

	/**
	 * @return integer
	 */
	public function getMerchantId() {
		if(is_null($this->merchantId)) {
			if($this->isDebug() === true) {
				$data = '496';
			} else {
				$data = env('KUVEYTTURK_MERCHANT_ID', false);

				if($data === false) {
					throw new Exception('LaravelKuveytturk merchantId doesn\'t set');
					// dd('LaravelKuveytturk merchantId doesn\'t set');
				}
			}

			$this->setMerchantId($data);
		}

		return $this->merchantId;
	}

	/**
	 * @param mixed $customerId
	 *
	 * @return self
	 */
	public function setCustomerId($customerId) {
		$customerId = intval($customerId);

		$this->customerId = $customerId;

		return $this;
	}

	/**
	 * @return integer
	 */
	public function getCustomerId() {
		if(is_null($this->customerId)) {
			if($this->isDebug()) {
				$data = '400235';
			} else {
				$data = env('KUVEYTTURK_CUSTOMER_ID', false);

				if($data === false) {
					throw new Exception('LaravelKuveytturk customerId doesn\'t set');
					// dd('LaravelKuveytturk customerId doesn\'t set');
				}
			}

			$this->setCustomerId($data);
		}

		return $this->customerId;
	}

	/**
	 * @param mixed $username
	 *
	 * @return self
	 */
	public function setUsername($username) {
		$this->username = $username;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getUsername() {
		if(is_null($this->username)) {
			if($this->isDebug() === true) {
				$data = 'apitest';
			} else {
				$data = env('KUVEYTTURK_USERNAME', false);

				if($data === false) {
					throw new Exception('LaravelKuveytturk username doesn\'t set');
					// dd('LaravelKuveytturk username doesn\'t set');
				}
			}

			$this->setUsername($data);
		}

		return $this->username;
	}

	/**
	 * @param mixed $password
	 *
	 * @return self
	 */
	public function setPassword($password) {
		$password = trim($password);

		$this->password = $password;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getPassword() {
		if(is_null($this->password)) {
			if($this->isDebug() === true) {
				$data = 'api123';
			} else {
				$data = env('KUVEYTTURK_PASSWORD', false);

				if($data === false) {
					throw new Exception('LaravelKuveytturk password doesn\'t set');
					// dd('LaravelKuveytturk password doesn\'t set');
				}
			}

			$this->setPassword($data);
		}

		return $this->password;
	}

	/**
	 * @param mixed $cardNumber
	 *
	 * @return self
	 */
	public function setCardNumber($cardNumber) {
		$cardNumber = trim($cardNumber);
		while(mb_strpos($cardNumber, ' ') !== false) {
			$cardNumber = mb_ereg_replace(' ', '', $cardNumber . '');
		}
		if(mb_strlen($cardNumber) !== 16) {
			throw new Exception('LaravelKuveytturk invalid cardNumber length');
			//dd('LaravelKuveytturk invalid cardNumber length');
		}

		$this->cardNumber = $cardNumber;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getCardNumber() {
		if(is_null($this->cardNumber)) {
			if($this->isDebug() === true) {
				$data = '4033 6025 6202 0327';
			} else {
				throw new Exception('LaravelKuveytturk cardNumber doesn\'t set');
				// dd('LaravelKuveytturk cardNumber doesn\'t set');
			}

			$this->setCardNumber($data);
		}

		return $this->cardNumber;
	}

	/**
	 * @param mixed $cardExpireDateYear
	 *
	 * @return self
	 */
	public function setCardExpireDateYear($cardExpireDateYear) {
		$cardExpireDateYear = intval($cardExpireDateYear);

		if($cardExpireDateYear < 1) {
			throw new Exception('LaravelKuveytturk invalid card expiry year');
			//dd('LaravelKuveytturk invalid card expiry year');
		}

		if($cardExpireDateYear < 1000) {
			$cardExpireDateYear += 2000;
		}

		if($cardExpireDateYear < date('Y')) {
			throw new Exception('LaravelKuveytturk card expired');
			//dd('LaravelKuveytturk card expired');
		}

		$this->cardExpireDateYear = $cardExpireDateYear;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getCardExpireDateYear() {
		if(is_null($this->cardExpireDateYear)) {
			if($this->isDebug() === true) {
				$data = '30';
			} else {
				throw new Exception('LaravelKuveytturk getCardExpireDateYear doesn\'t set');
				//dd('LaravelKuveytturk getCardExpireDateYear doesn\'t set');
			}

			$this->setCardExpireDateYear($data);
		}

		$data = $this->cardExpireDateYear . '';
		$data = substr($data, -2);
		return $data;
	}

	/**
	 * @return string
	 */
	public function getRawCardExpireDateYear() {
		return $this->cardExpireDateYear;
	}

	/**
	 * @param mixed $cardExpireDateMonth
	 *
	 * @return self
	 */
	public function setCardExpireDateMonth($cardExpireDateMonth) {
		$cardExpireDateMonth = intval($cardExpireDateMonth);
		if($cardExpireDateMonth < 1 || $cardExpireDateMonth > 12) {
			throw new Exception('LaravelKuveytturk invalid card expiry month');
			//dd('LaravelKuveytturk invalid card expiry month');
		}

		$this->cardExpireDateMonth = $cardExpireDateMonth;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getCardExpireDateMonth() {
		if(is_null($this->cardExpireDateMonth)) {
			if($this->isDebug() === true) {
				$data = '01';
			} else {
				throw new Exception('LaravelKuveytturk cardExpireDateMonth doesn\'t set');
				//dd('LaravelKuveytturk cardExpireDateMonth doesn\'t set');
			}

			$this->setCardExpireDateMonth($data);
		}

		$data = $this->cardExpireDateMonth;
		$data = $data < 10 ? '0' . $data : $data . '';
		return $data;
	}

	/**
	 * @return string
	 */
	public function getRawCardExpireDateMonth() {
		return $this->cardExpireDateMonth;
	}

	/**
	 * @param mixed $cardCvv2
	 *
	 * @return self
	 */
	public function setCardCvv2($cardCvv2) {
		$cardCvv2 = trim($cardCvv2 . '');

		if(mb_strlen($cardCvv2) < 3 || mb_strlen($cardCvv2) > 4) {
			throw new Exception('LaravelKuveytturk invalid cardCvv2');
			//dd('LaravelKuveytturk invalid cardCvv2');
		}

		$this->cardCvv2 = $cardCvv2;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getCardCvv2() {
		if(is_null($this->cardCvv2)) {
			if($this->isDebug() === true) {
				$data = '861';
			} else {
				throw new Exception('LaravelKuveytturk cardCvv2 doesn\'t set');
				//dd('LaravelKuveytturk cardCvv2 doesn\'t set');
			}

			$this->setCardCvv2($data);
		}

		return $this->cardCvv2;
	}

	/**
	 * @param mixed $cardHolderName
	 *
	 * @return self
	 */
	public function setCardHolderName($cardHolderName) {
		$cardHolderName = trim($cardHolderName);
		if(mb_strlen($cardHolderName) < 1 || mb_strlen($cardHolderName) > 50) {
			throw new Exception('LaravelKuveytturk invalid length cardHolderName');
			//dd('LaravelKuveytturk invalid length cardHolderName');
		}

		$this->cardHolderName = $cardHolderName;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getCardHolderName() {
		if($this->isDebug() && is_null($this->cardHolderName)) {
			$this->setCardHolderName('Ali Gençsoy');
		}

		if(is_null($this->cardHolderName)) {
			throw new Exception('LaravelKuveytturk cardHolderName cannot be empty');
			//dd('LaravelKuveytturk cardHolderName cannot be empty');
		}

		return $this->cardHolderName;
	}

	/**
	 * @param mixed $cardType
	 *
	 * @return self
	 */
	public function setCardType($cardType) {
		switch ($cardType) {
			case 'Visa':
			case 'MasterCard':
			case 'TROY':
				break;
			default:
				throw new Exception('LaravelKuveytturk invalid card type');
				//dd('LaravelKuveytturk invalid card type');
				break;
		}

		$this->cardType = $cardType;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getCardType() {
		if(is_null($this->cardType)) {
			$this->setCardType('MasterCard');
		}

		return $this->cardType;
	}

	/**
	 * @param mixed $batchId
	 *
	 * @return self
	 */
	public function setBatchId($batchId) {
		$batchId = intval($batchId);

		$this->batchId = $batchId;

		return $this;
	}

	/**
	 * @return integer
	 */
	public function getBatchId() {
		if(is_null($this->batchId)) {
			$data = env('KUVEYTTURK_BATCH_ID', false) ? env('KUVEYTTURK_BATCH_ID', false) : 0;
			$data = intval($data);

			$this->batchId = $data;
		}

		return $this->batchId;
	}

	/**
	 * @param mixed $transactionType
	 *
	 * @return self
	 */
	public function setTransactionType($transactionType) {
		$transactionType = trim($transactionType);

		$this->transactionType = $transactionType;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTransactionType() {
		if(is_null($this->transactionType)) {
			$this->setTransactionType('Sale');
		}

		return $this->transactionType;
	}

	/**
	 * @param mixed $installmentCount
	 *
	 * @return self
	 */
	public function setInstallmentCount($installmentCount) {
		$installmentCount = intval($installmentCount);
		if($installmentCount < 0 || $installmentCount > 9999) {
			// throw new Exception('LaravelKuveytturk invalid installmentCount');
			dd('LaravelKuveytturk invalid installmentCount');
		}

		$this->installmentCount = $installmentCount;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getInstallmentCount() {
		if(is_null($this->installmentCount)) {
			$this->setInstallmentCount(0);
		}

		return $this->installmentCount;
	}

	/**
	 * @param mixed $amount
	 *
	 * @return self
	 */
	public function setAmount($amount) {
		$data = floatval($amount) * 100;
		if($data < 0) {
			throw new Exception('LaravelKuveytturk amount cannot be less than zero');
			//dd('LaravelKuveytturk amount cannot be less than zero');
		}
		$data = intval($data);

		$this->amount = $data;
		if(is_null($this->displayAmount)) {
			$this->setDisplayAmount($amount);
		}

		return $this;
	}

	/**
	 * @return integer
	 */
	public function getAmount() {
		if($this->isDebug() && is_null($this->amount)) {
			$this->setAmount(10);
		}

		if(is_null($this->amount)) {
			dd('LaravelKuveytturk amount cannot be null');
		}

		return $this->amount;
	}

	/**
	 * @return 
	 */
	public function getRawAmount() {
		return $this->amount / 100;
	}

	/**
	 * @param mixed $displayAmount
	 *
	 * @return self
	 */
	public function setDisplayAmount($displayAmount) {
		$data = floatval($displayAmount) * 100;
		if($data < 0) {
			throw new Exception('LaravelKuveytturk displayAmount cannot be less than zero');
			//dd('LaravelKuveytturk displayAmount cannot be less than zero');
		}
		$data = intval($data);

		$this->displayAmount = $data;

		if(is_null($this->amount)) {
			$this->setAmount($displayAmount);
		}

		return $this;
	}

	/**
	 * @return integer
	 */
	public function getDisplayAmount() {
		if(is_null($this->displayAmount)) {
			dd('LaravelKuveytturk displayAmount cannot be null');
		}

		return $this->displayAmount;
	}

	/**
	 * @return integer
	 */
	public function getRawDisplayAmount() {
		return $this->displayAmount / 100;
	}

	/**
	 * @param mixed $currencyCode
	 *
	 * @return self
	 */
	public function setCurrencyCode($currencyCode) {
		$currencyCode = intval($currencyCode);

		$this->currencyCode = $currencyCode;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCurrencyCode() {
		if(is_null($this->currencyCode)) {
			$this->setCurrencyCode('0949');
		}

		$data = $this->currencyCode;
		$data = $data < 1000 ? '0' . $data : $data . '';

		return $data;
	}

	/**
	 * @return mixed
	 */
	public function getRawCurrencyCode() {
		return $this->currencyCode;
	}

	/**
	 * @param mixed $merchantOrderId
	 *
	 * @return self
	 */
	public function setMerchantOrderId($merchantOrderId) {
		$merchantOrderId = trim($merchantOrderId . '');
		if(mb_strlen($merchantOrderId) > 50) {
			throw new Exception('LaravelKuveytturk invalid merchantOrderId');
			//dd('LaravelKuveytturk invalid merchantOrderId');
		}

		$this->merchantOrderId = $merchantOrderId;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getMerchantOrderId() {
		if($this->isDebug() && is_null($this->merchantOrderId)) {
			$this->setMerchantOrderId('Sample_Order_ID_' . \Illuminate\Support\Str::random(6));
		}

		if(is_null($this->merchantOrderId)) {
			throw new Exception('LaravelKuveytturk merchantOrderId cannot be null');
			//dd('LaravelKuveytturk merchantOrderId cannot be null');
		}

		return $this->merchantOrderId;
	}

	/**
	 * @param mixed $transactionSecurity
	 *
	 * @return self
	 */
	public function setTransactionSecurity($transactionSecurity) {
		$transactionSecurity = trim($transactionSecurity . '');

		$this->transactionSecurity = $transactionSecurity;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTransactionSecurity() {
		if(is_null($this->transactionSecurity)) {
			$this->setTransactionSecurity(3);
		}

		return $this->transactionSecurity;
	}

	/**
	 * @param mixed $securePaymentUrl
	 *
	 * @return self
	 */
	public function setSecurePaymentUrl($securePaymentUrl) {
		$this->securePaymentUrl = trim($securePaymentUrl . '');

		return $this;
	}

	/**
	 * @return string url
	 */
	public function getSecurePaymentUrl() {
		if(is_null($this->securePaymentUrl)) {
			$data = env('KUVEYTTURK_SECURE_PAYMENT_URL', false);

			if($data === false) {
				$data = 'https://boa.kuveytturk.com.tr/sanalposservice/Home/ThreeDModelPayGate';
			}

			if($this->isDebug() === true) {
				$data = 'https://boatest.kuveytturk.com.tr/boa.virtualpos.services/Home/ThreeDModelPayGate';
			}

			$this->setSecurePaymentUrl($data);
		}

		return $this->securePaymentUrl;
	}

	/**
	 * @param mixed $paymentConfirmationUrl
	 *
	 * @return self
	 */
	public function setPaymentConfirmationUrl($paymentConfirmationUrl) {
		$this->paymentConfirmationUrl = trim($paymentConfirmationUrl . '');

		return $this;
	}

	/**
	 * @return string url
	 */
	public function getPaymentConfirmationUrl() {
		if(is_null($this->paymentConfirmationUrl)) {
			$data = env('KUVEYTTURK_SECURE_PAYMENT_URL', false);

			if($data === false) {
				$data = 'https://boa.kuveytturk.com.tr/sanalposservice/Home/ThreeDModelProvisionGate';
			}

			if($this->isDebug() === true) {
				$data = 'https://boatest.kuveytturk.com.tr/boa.virtualpos.services/Home/ThreeDModelProvisionGate';
			}

			$this->setPaymentConfirmationUrl($data);
		}

		return $this->paymentConfirmationUrl;
	}

	/**
	 * @param mixed $raw
	 *
	 * @return self
	 */
	public function setRaw($raw) {
		$this->raw = $raw;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getRaw() {
		return $this->raw;
	}

	/**
	 * @param mixed $xml
	 *
	 * @return self
	 */
	public function setXml($xml) {
		$this->xml = $xml;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getXml() {
		return $this->xml;
	}

	/**
	 * @param mixed $md
	 *
	 * @return self
	 */
	public function setMd($md) {
		$this->md = $md;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMd() {
		return $this->md;
	}

	/**
	 * @param mixed $hashData
	 *
	 * @return self
	 */
	public function setHashData($hashData) {
		$this->hashData = $hashData;

		return $this;
	
		/**
		 * @return mixed
		 */}
	public function getHashData() {
		return $this->hashData;
	}

	/**
	 * @param mixed $cancelAmount
	 *
	 * @return self
	 */
	public function setCancelAmount($cancelAmount) {
		$this->cancelAmount = $cancelAmount;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCancelAmount() {
		return $this->cancelAmount;
	}

	/**
	 * @param mixed $responseCode
	 *
	 * @return self
	 */
	public function setResponseCode($responseCode) {
		$this->responseCode = $responseCode;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getResponseCode() {
		return $this->responseCode;
	}

	/**
	 * @param mixed $responseMessage
	 *
	 * @return self
	 */
	public function setResponseMessage($responseMessage) {
		$this->responseMessage = $responseMessage;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getResponseMessage() {
		return $this->responseMessage;
	}

	/**
	 * @param mixed $referenceId
	 *
	 * @return self
	 */
	public function setReferenceId($referenceId) {
		$this->referenceId = $referenceId;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getReferenceId() {
		return $this->referenceId;
	}

	/**
	 * @param mixed $businessKey
	 *
	 * @return self
	 */
	public function setBusinessKey($businessKey) {
		$this->businessKey = $businessKey;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getBusinessKey() {
		return $this->businessKey;
	}

	/**
	 * @param mixed $provisionNumber
	 *
	 * @return self
	 */
	public function setProvisionNumber($provisionNumber) {
		$this->provisionNumber = $provisionNumber;

		return $this;
	}

	/**
	 * @return self
	 */
	public function getProvisionNumber() {
		return $this->provisionNumber;
	}

	/**
	 * @param mixed $rrn
	 *
	 * @return self
	 */
	public function setRrn($rrn) {
		$this->rrn = $rrn;

		return $this;
	}

	/**
	 * @return self
	 */
	public function getRrn() {
		return $this->rrn;
	}

	/**
	 * @param mixed $stan
	 *
	 * @return self
	 */
	public function setStan($stan) {
		$this->stan = $stan;

		return $this;
	}

	/**
	 * @return self
	 */
	public function getStan() {
		return $this->stan;
	}

	/**
	 * @param mixed $orderId
	 *
	 * @return self
	 */
	public function setOrderId($orderId) {
		$this->orderId = $orderId;

		return $this;
	}

	/**
	 * @return self
	 */
	public function getOrderId() {
		return $this->orderId;
	}
}
