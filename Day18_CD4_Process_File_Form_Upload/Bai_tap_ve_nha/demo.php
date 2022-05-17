<?php
$arrs = file('bt6.csv');
echo '<pre>';
print_r($arrs);
echo '</pre>';
?>
<table border="1" cellspacing="0" cellpadding="8">
    <?php foreach ($arrs AS $value): ?>
        <?php
        $tests = explode(',', $value);
        ?>
        <tr>
            <?php foreach ($tests AS $test): ?>
                <td><?php echo $test; ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>

</table>
