<script src="../js/validate.js"></script>
<script>
              let checkall = document.getElementById('checkall');
              let clearall = document.getElementById('clearall');
              let deleteall = document.getElementById('delete_all');
              let updateall = document.getElementById('update_all');

              let checkbox = document.getElementsByClassName('checkbox');

              //Sự kiện checkall
              checkall.addEventListener('click', function() {
                     for (let i = 0; i < checkbox.length; i++) {
                            checkbox[i].checked = true;
                     }
              });
              clearall.addEventListener('click', function() {
                     for (let i = 0; i < checkbox.length; i++) {
                            checkbox[i].checked = false;
                     }
              });

              //kiểm tra xem người dùng có chọn cái nào chưa
              function check_select() {
                     for (let i = 0; i < checkbox.length; i++) {
                            if (checkbox[i].checked == true) {
                                   return true;
                            }
                     }
                     return false;
              }

              //Xử lý nút xóa, khi chưa chọn thì không cho gửi dữ liệu lên server
              deleteall.addEventListener('click', function(event) {
                     if (check_select() === false) {
                            alert("Bạn cần chọn ít nhất 1 danh mục để xóa.");
                            event.preventDefault(); //Không cho phép kích hoạt sự kiện gửi dữ liệu lên server
                            return false;
                     }
              })
              updateall.addEventListener('click', function(event) {
                     if (check_select() === false) {
                            alert("Bạn cần chọn ít nhất 1 danh mục để xóa.");
                            event.preventDefault(); //Không cho phép kích hoạt sự kiện gửi dữ liệu lên server
                            return false;
                     }
              })
       </script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>