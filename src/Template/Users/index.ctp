<h1>My rol is <?=$u_role?></h1>
<table>
    <th>username</th>
    <th>email</th>
    <th>rol</th>
<tbody>
<?php foreach($users as $user): ?>
    <tr>
        <td><?=$user->username ?></td>
        <td><?=$user->email ?></td>
        <td><?=$user->role ?></td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>