<?php
    require_once 'task_1.php';
    require_once 'task_3.php';

    try {
        $account = new BankAccount("USD");
        echo "Current balance " . $account->getBalance() . "\n";

        $account->deposit(100);
        echo "After depositing 100 " . $account->getBalance() . "\n";

        $account->withdraw(30);
        echo "After withdrawing 30 " . $account->getBalance() . "\n";

        $savings = new SavingsAccount("USD");
        echo "\nCurrent balance " . $savings->getBalance() . "\n";

        $savings->deposit(200);
        echo "After depositing 200 " . $savings->getBalance() . "\n";

        $savings->applyInterest();
        echo "After applying interest " . $savings->getBalance() . "\n";

        $account->withdraw(1000); 
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }

    try {
        $account->deposit(-50); 
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }

    try {
        $account->withdraw(-10); 
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
?>
