<?php
$row = $this->db->getRecords(UsersTable::NAME);
?>

<h2>Operacje na użytkownikach</h2>
<div class="users-panel">
    <div class="articles-top">
        <form>
            <input>
            <button>Szukaj</button>
        </form>
    </div>
<table>
    <tr>
        <th></th>
        <th>ID</th>
        <th>Użytkownik</th>
        <th>Email</th>
        <th>Status</th>
    </tr>
    <?php for ($i = 0; $i < count($row); $i++) { ?>
       <tr>
           <td>
               <form method="post">
                   <button type="submit" name="blockuser" title="Zablokuj użytkownika" value=" <?php echo $row[$i]['user_id']; ?> ">
                       <img src="images/block.svg">
                   </button>
                   <button type="submit" name="statususer" title="Zmień status użytkownika" value=" <?php echo $row[$i]['user_id']; ?> ">
                       <img src="images/status.svg">
                   </button>
               </form>
           </td>
           <td>
                <span>
                    <?php echo $row[$i]['user_id']; ?>
                </span>
           </td>
           <td>
                <span>
                    <?php echo $row[$i]['user_login']; ?>
                </span>
           </td>
           <td>
                <span>
                    <?php echo $row[$i]['user_email']; ?>
                </span>
           </td>
           <td>
                <span>
                    <?php echo $row[$i]['user_status']; ?>
                </span>
           </td>
        </tr>
    <?php } ;?>
</table>
</div>