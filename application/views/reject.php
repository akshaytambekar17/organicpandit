        <form role="form">
                <div class="form-group">
                    <label for="id"><span class="glyphicon glyphicon-user"></span> Id</label>
                    <input type="text" class="form-control" id="id" placeholder="" value="<?php echo $row->id; ?>">
                </div>
                <div class="form-group">
                    <label for="user_id"><span class="glyphicon glyphicon-eye-open"></span> UserId</label>
                    <input type="text" class="form-control" id="user_id" placeholder="" value="<?php echo $row->user_id; ?>">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value="" checked>Remember me</label>
                </div>
                <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Verify</button>
            </form>