<?php include_once __DIR__."/Fragment/header.php"; ?>


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

<?php include_once __DIR__."/Fragment/footer.php"; ?>