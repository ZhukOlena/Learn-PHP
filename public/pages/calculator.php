<?php

use App\Service\Calculator\Calculator;
use App\Service\Calculator\CalculatorCommandsRegistry;
use App\Service\Calculator\Validator\LeftAndRightExistenceValidator;
use App\Service\Calculator\Validator\LeftExistenceValidator;
use App\Service\Calculator\Validator\NoneExistenceValidator;
use App\Service\Calculator\Command\AddCalculatorCommand;
use App\Service\Calculator\Command\SubCalculatorCommand;
use App\Service\Calculator\Command\DivCalculatorCommand;
use App\Service\Calculator\Command\PiCalculatorCommand;
use App\Service\Calculator\Command\SinCalculatorCommand;

$command = null;
$result = null;
$leftOperand = null;
$rightOperand = null;


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $command = $_POST['command'];
    $leftOperand = (float) $_POST['left'];
    $rightOperand = (float) $_POST['right'];

    $registry = new CalculatorCommandsRegistry();
    $registry->add('add', new AddCalculatorCommand(), new LeftAndRightExistenceValidator());
    $registry->add('sub', new SubCalculatorCommand(), new LeftAndRightExistenceValidator());
    $registry->add('div', new DivCalculatorCommand(), new LeftAndRightExistenceValidator());
    $registry->add('pi', new PiCalculatorCommand(), new NoneExistenceValidator());
    $registry->add('sin', new SinCalculatorCommand(), new LeftExistenceValidator());

    $calculator = new Calculator($registry);

    $result = $calculator->run($command, $leftOperand, $rightOperand);
}
?>

<html>
<head>
</head>
    <body>
        <nav>
            <a href="/">Home</a>
            <a href="/Calculator">Calculator</a>
        </nav>

        <h1>Calculator</h1>
    <form method="post" action="/calculator">
        <div>
            <label>Command:</label>
            <select name="command">
                <option value="add" <?php if ($command == 'add') { print 'selected';} ?>>Add</option>
                <option value="sub" <?php if ($command =='sub') { print 'selected';} ?>>Sub</option>
                <option value="div" <?php if ($command == 'div') { print 'selected';} ?>>Div</option>
                <option value="pi" <?php if ($command == 'pi') { print 'selected';} ?>>PI</option>
                <option value="sin" <?php  if ($command == 'sin') {print 'selected';} ?>>Sin</option>
            </select>
        </div>

        <div>
            <label>Left operand:</label>
            <input type="text" name="left" value="<?php print $leftOperand ?>"/>
        </div>

        <div>
            <label>Right operand:</label>
            <input type="text" name="right" value="<?php print $rightOperand ?>"/>
        </div>

        <div>
            <input type="submit" value="Calculate"/>
        </div>

        <?php if ($result !== null): ?>
        <div>
            Execution result: <?php print $result; ?>
        </div>
        <?php endif; ?>
    </form>
    </body>
</html>