<?php
    interface AccountInterface  {
        public function deposit($amount);
        public function withdraw($amount);
        public function getBalance();
    }

    class BankAccount implements AccountInterface {
        const MIN_BALANCE = 0;

        private $balance;
        private $currency;

        public function __construct($currency = "USD") {
            $this->balance = self::MIN_BALANCE;
            $this->currency = $currency;
        }

        public function deposit($amount) {
            if ($amount <= 0) {
                throw new Exception("Amount is below 0.");
            }
            $this->balance += $amount;
        }

        public function withdraw($amount) {
            if ($amount <= 0) {
                throw new Exception("Must be above 0.");
            }
            if ($amount > $this->balance) {
                throw new Exception("Not enough balance.");
            }
            $this->balance -= $amount;
        }

        public function getBalance() {
            return $this->balance . " " . $this->currency;
        }
    }
?>