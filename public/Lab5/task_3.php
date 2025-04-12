<?php
    require_once  "task_1.php";

    class SavingsAccount extends BankAccount {
        public static $interestRate = 0.05;

        public function applyInterest() {
            $interest = $this->getRawBalance() * self::$interestRate;
            $this->deposit($interest);
        }

    
        private function getRawBalance() {
            $fullBalance = $this->getBalance();
            return floatval(explode(" ", $fullBalance)[0]);
        }
    }
?>