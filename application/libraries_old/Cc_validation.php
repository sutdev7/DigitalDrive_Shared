<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cc_validation {
	
	public function validateCreditcard_number($cc_num)		
	{
		$credit_card_number = $this->sanitize($cc_num);
		// Get the first digit
		$data = array();
		$firstnumber = substr($credit_card_number, 0, 1);
		// Make sure it is the correct amount of digits. Account for dashes being present.
		switch ($firstnumber)
		{
			case 3:
				$data['card_type'] ="American Express";
				if (!preg_match('/^3\d{3}[ \-]?\d{6}[ \-]?\d{5}$/', $credit_card_number))
				{
					//return 'This is not a valid American Express card number';
					$data['status']='false'; 
					return $data;
				}
				break;
			case 4:
				$data['card_type'] ="Visa";
				if (!preg_match('/^4\d{3}[ \-]?\d{4}[ \-]?\d{4}[ \-]?\d{4}$/', $credit_card_number))
				{
					//return 'This is not a valid Visa card number';
					$data['status']='false'; 
					return $data;
				}
				break;
			case 5:
				$data['card_type'] ="MasterCard";
				if (!preg_match('/^5\d{3}[ \-]?\d{4}[ \-]?\d{4}[ \-]?\d{4}$/', $credit_card_number))
				{
					//return 'This is not a valid MasterCard card number';
					$data['status']='false'; 
					return $data;
				}
				break;
			case 6:
				$data['card_type'] ="Discover";
				if (!preg_match('/^6011[ \-]?\d{4}[ \-]?\d{4}[ \-]?\d{4}$/', $credit_card_number))
				{
					//return 'This is not a valid Discover card number';
					$data['status']='false'; 
					return $data;
				}
				break;
			default:
				//return 'This is not a valid credit card number';
				$data['card_type'] ="Invalid";
				$data['status']='false'; 
				return $data;
		}
		// Here's where we use the Luhn Algorithm
		$credit_card_number = str_replace('-', '', $credit_card_number);
		$map = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9,0, 2, 4, 6, 8, 1, 3, 5, 7, 9);
		$sum = 0;
		$last = strlen($credit_card_number) - 1;
		for ($i = 0; $i <= $last; $i++)
		{
			$sum += $map[$credit_card_number[$last - $i] + ($i & 1) * 10];
		}
		if ($sum % 10 != 0)
		{
			//return 'This is not a valid credit card number';
			$data['status']='false'; 
			return $data;
		}
		// If we made it this far the credit card number is in a valid format
		$data['status']='true'; 
		return $data;
	}
	public function validateCreditCardExpirationDate($mon,$yr)
	{
		$month = $this->sanitize($mon);
		$year = $this->sanitize($yr);
		if (!preg_match('/^\d{2}$/', $month))
		{
			return '1false'; // The month isn't a one or two digit number
		}
		else if (!preg_match('/^\d{4}$/', $year))
		{
			return '2false'; // The year isn't four digits long
		}
		else if ($year < date("Y"))
		{
			return '3false'; // The card is already expired
		}
		else if ($month < date("m") && $year == date("Y"))
		{
			return '4false'; // The card is already expired
		}
		return 'true';
	}
	public function validateCVV($cc_num, $cc_cvv)
	{
		$cardNumber = $this->sanitize($cc_num);
		$cvv = $this->sanitize($cc_cvv);
		// Get the first number of the credit card so we know how many digits to look for
		$firstnumber = (int) substr($cardNumber, 0, 1);
		if ($firstnumber === 3)
		{
			if (!preg_match("/^\d{4}$/", $cvv))
			{
				// The credit card is an American Express card but does not have a four digit CVV code
				return 'false';
			}
		}
		else if (!preg_match("/^\d{3}$/", $cvv))
		{
			// The credit card is a Visa, MasterCard, or Discover Card card but does not have a three digit CVV code
			return 'false';
		}
		return 'true';
	}
	function sanitize($value)
    {
        return trim(strip_tags($value));
    }

}
/* End of file My_payment.php */
/* Location: ./system/application/libraries/My_payment.php */
