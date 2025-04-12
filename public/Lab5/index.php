<?php
    require_once 'task_1.php';
    require_once 'task_3.php';

    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $accountType = $_POST['accountType'];
        $action = $_POST['action'];
        $amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;

        if (isset($_SESSION['accounts'][$accountType])) {
            $account = unserialize($_SESSION['accounts'][$accountType]);
        } else {
            $account = $accountType === "SavingsAccount" ? new SavingsAccount("USD") : new BankAccount("USD");
        }

        try {
            switch ($action) {
                case "deposit":
                    $account->deposit($amount);
                    echo "Deposited successfully. New balance: " . $account->getBalance();
                    break;
                case "withdraw":
                    $account->withdraw($amount);
                    echo "Withdrawn successfully. New balance: " . $account->getBalance();
                    break;
                case "getBalance":
                    echo "Current balance: " . $account->getBalance();
                    break;
                case "applyInterest":
                    if ($accountType === "SavingsAccount") {
                        $account->applyInterest();
                        echo "Interest applied. New balance: " . $account->getBalance();
                    } else {
                        echo "Interest can only be applied to SavingsAccount.";
                    }
                    break;
                default:
                    echo "Invalid action.";
            }

            $_SESSION['accounts'][$accountType] = serialize($account);

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>
