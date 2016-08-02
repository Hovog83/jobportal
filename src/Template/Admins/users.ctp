<?php echo $this->Flash->render();?>
<div class="adminCont">
    <h3>Users</h3>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered usersTbl">
            <thead>
                <th style="width: 13%;">Email</th>
                <th style="width: 15%;">Approved</th>
                <th style="width: 13%;">Delete</th>
                <th style="width: 13%;">View User</th>
                <th style="width: 13%;">Approve</th>
                <th style="width: 13%;">Decline</th>
            </thead>
            <tbody>
                <?php if(!empty($users)){ ?>
                     <?php foreach ($users as $user){ ?>
                        <tr>
                            <td><?php echo $user->email; ?></td>
                            <td><?php echo ($user->approved)?'Yes':'No'; ?></td>
                            <td><?php echo $this->Form->postLink(__d('Users', 'Delete User'), ['action' => 'delete', $user->id],['class'=>'btn btn-danger','confirm' => __d('Users', 'Are you sure you want to delete  {0}?', $user->email)]) ?></td>
                            <td><?php echo $this->Html->link('View', ['action' => 'viewUser', $user->id],['class' => 'btn btn-primary']) ?></td>
                            <td><?php echo $this->Html->link('Approve', ['action' => 'approveUser', $user->id],['class' => 'btn btn-primary']) ?></td>
                            <td><?php echo $this->Html->link('Decline', ['action' => 'decilneUser', $user->id],['class' => 'btn btn-primary']) ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php 
        if ($this->Paginator->hasPage(null, 2)) { 
            echo '<tfoot>';
            echo '<tr>';
            echo '<td colspan="7" class="text-right">';
            echo '<ul class="pagination pagination-right">';
            echo $this->Paginator->first('First', array('escape' => false, 'tag' => 'li'), null, array('escape' => false, 'tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
            echo $this->Paginator->prev(' Prev', array('escape' => false, 'tag' => 'li'), null, array('escape' => false, 'tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
            echo $this->Paginator->numbers(array(
                'currentClass' => 'active',
                'currentTag' => 'a',
                'tag' => 'li',
                'separator' => '',
            ));
            echo $this->Paginator->next('Next', array('escape' => false, 'tag' => 'li', 'currentClass' => 'disabled'), null, array('escape' => false, 'tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
            echo '  </ul>';
            echo '</td>';
            echo '</tr>';
            echo '</tfoot>';    
        }

              
    ?>
</div>