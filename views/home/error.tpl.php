<h1>ERROR</h1>
<?php //if(isset($this->post) && count($this->post)): ?>
    <table>
        <?php for($i = 0; $i < count($this->post); $i++): ?>

            <tr>
                <td><?= $this->post[$i]['usuario']; ?></td>
                <td><?= $this->post[$i]['pass']; ?></td>

            </tr>

        <?php endfor; ?>
    </table>
<?php //else: ?>

<?php //endif; ?>