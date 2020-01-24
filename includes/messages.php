 <div class="card card-primary card-outline" style="height: 520.5px">
     <div class="card-header">
         <h3 class="card-title">Enviar nova mensagem</h3>
     </div>
     <form method="POST">
         <div class="card-body">
             <div class="form-group">
                 <label>Para:</label>
                 <select class="form-control select2" name="txtTo" id="txtTo" style="width: 100%;">

                     <?php

                        $tempU = new user();
                        $users = $tempU->getAllActiveUsers();

                        foreach ($users as $user) {
                            $userId = $user['id'];
                            $userName = $user['username'];
                            $userEmail = $user['email'];

                            echo '<option value="' . $userId . '">' . $userName . ' | Email: ' . $userEmail . '</option>';
                        }

                        ?>
                 </select>
             </div>
             <div class="form-group">
                 <textarea id="compose-textarea" name="txtMessage" id="txtMessage" class="form-control" style="height: 267px"></textarea>
             </div>
         </div>
         <!-- /.card-body -->
         <div class="card-footer">
             <div class="float-right">
                 <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Enviar</button>
             </div>
         </div>
         <!-- /.card-footer -->
     </form>
 </div>