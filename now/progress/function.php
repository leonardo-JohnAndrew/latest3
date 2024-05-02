
<script src = "jquery.js"> 
</script>
    <script>
        $('document').ready(function(){
           $(".btn_add").click(function(e){
            e.preventDefault();
            $("table tbody").prepend(`<tr>
             <td><input type="text" name="firstname[]"  size="10px"></td>
             <td><input type="text" name="lastname[]"  size="10px"></td>
             <td><input type="text" name="middle[]" size="10px"></td>
             <td><input type="text" name="username[]" size="10px"></td>
             <td><input type="text" name="email[]"  size="10px"></td>
             <td><input type="text" name="password[]" size="10px"></td>
             <td><select style="font-size: smaller;" name="type[]" value = "none">
              <option selected>Type</option>
              <option value="Admin">Admin
              <option value="Faculty">Faculty
              <option value="Student">Student</option>
             </select></td>
       
       
           </tr>
           `);       

           });

            $(document).on('click','.clear', function(e){
              e.preventDefault();
              window.location.href = 'createaccounts.php';
            });
        });

    </script>
