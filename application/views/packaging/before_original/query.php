<html>
    <head>
    </head>
    <body>
        <form action="<?php echo base_url()?>admin/Dashboard/insert" name="query_form" method="post">
            <p style="color:red"><?php echo $this->session->flashdata('error')?></p>
             <p style="color:red"><?php echo $this->session->flashdata('success')?></p><br><br>
            password: <input type="text" name="password" value=""><br><br>
    <textarea name="query" value="" cols="100" rows="15">
    </textarea><br><br>
    <input type="submit" value="submit">
    </form>
    </body>
</html>