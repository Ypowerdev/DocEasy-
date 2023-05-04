<?php include __DIR__ . '/../module_header.php'; ?>
<tr>
    <td>
        <?php foreach ($links as $link): ?>
            <h5><?= $link['title'] ?></h5></a>
             <p>&nbsp;&nbsp;&nbsp;<a href="/claim/<?= $link['id'] ?>"><?=$link['name']?></a></p>
            <hr>
        <?php endforeach; ?>
    </td>
</tr> 

<?php include __DIR__ . '/../module_footer.php'; ?>