
document.getElementById('inputState').addEventListener('change', function() {
    var selectedRole = this.value;
    // Chọn các quyền tương ứng với vai trò Admin
    if (selectedRole === '1') {
        var rulesToCheck = ['rule0','rule1', 'rule2', 'rule3','rule4', 'rule5', 'rule6','rule7', 'rule8','rule9','rule'];
        // Duyệt qua mảng và thiết lập thuộc tính checked cho mỗi quy tắc
        rulesToCheck.forEach(function(rule) {
            document.getElementById(rule).checked = true;
        });
    }
    else if (selectedRole === '2') {
        //Xóa các select cũ
        var rulesToCheck = ['rule0','rule1', 'rule2', 'rule3','rule4', 'rule5', 'rule6','rule7', 'rule8','rule9','rule'];
        rulesToCheck.forEach(function(rule) {
            document.getElementById(rule).checked = false;
        });
        var rulesToCheck = ['rule1', 'rule2', 'rule3','rule4', 'rule5','rule8','rule9','rule'];
        // Duyệt qua mảng và thiết lập thuộc tính checked cho mỗi quy tắc
        rulesToCheck.forEach(function(rule) {
            document.getElementById(rule).checked = true;
        });
    }
    else if (selectedRole === '3') {
        var rulesToCheck = ['rule0','rule1', 'rule2', 'rule3','rule4', 'rule5', 'rule6','rule7', 'rule8','rule9','rule'];
        rulesToCheck.forEach(function(rule) {
            document.getElementById(rule).checked = false;
        });
        var rulesToCheck = ['rule8','rule'];
        // Duyệt qua mảng và thiết lập thuộc tính checked cho mỗi quy tắc
        rulesToCheck.forEach(function(rule) {
            document.getElementById(rule).checked = true;
        });
    }   
    else if (selectedRole === '4') {
        var rulesToCheck = ['rule0','rule1', 'rule2', 'rule3','rule4', 'rule5', 'rule6','rule7', 'rule8','rule9','rule'];
        rulesToCheck.forEach(function(rule) {
            document.getElementById(rule).checked = false;
        });
        var rulesToCheck = ['rule9','rule'];
        // Duyệt qua mảng và thiết lập thuộc tính checked cho mỗi quy tắc
        rulesToCheck.forEach(function(rule) {
            document.getElementById(rule).checked = true;
        });
    }
});



//Edit nhân viên
    // Sử dụng lớp chung cho tất cả nút "Edit"
    document.querySelectorAll('#edit-member-btn').forEach(function(button) {
        button.addEventListener('click', function () {
            // Lấy user ID từ thuộc tính data-user-id
            var userId = this.getAttribute('data-user-id');
            // Gửi yêu cầu Ajax đến Laravel route để lấy dữ liệu
            fetch('/admin/staff/api/getdetail/' + userId) // Thay thế đường dẫn phù hợp với route của bạn
                .then(response => response.json())
                .then(data => {
                    // Hiển thị dữ liệu lấy được trong modal
                    document.getElementById('inputname4').value = data.name;
                    document.getElementById('inputEmail4').value = data.email;
                    document.getElementById('inputPassword4').value = ''; //

                    //Xử lí action form
                    var form = document.getElementById('edit-member-form'); //
                    form.action = '/admin/staff/update-staff/' + userId;
                })
                .catch(error => console.error('Error:', error));
        });
    });

    document.getElementById('inputState4').addEventListener('change', function() {
        var selectedRole = this.value;
        // Chọn các quyền tương ứng với vai trò Admin
        if (selectedRole === '1') {
            var rulesToCheck = ['rule0a','rule1a', 'rule2a', 'rule3a','rule4a', 'rule5a', 'rule6a','rule7a', 'rule8a','rule9a','rulea'];
            // Duyệt qua mảng và thiết lập thuộc tính checked cho mỗi quy tắc
            rulesToCheck.forEach(function(rule) {
                document.getElementById(rule).checked = true;
            });
        }
        else if (selectedRole === '2') {
            //Xóa các select cũ
            var rulesToCheck = ['rule0a','rule1a', 'rule2a', 'rule3a','rule4a', 'rule5a', 'rule6a','rule7a', 'rule8a','rule9a','rulea'];
            rulesToCheck.forEach(function(rule) {
                document.getElementById(rule).checked = false;
            });
            var rulesToCheck = ['rule1a', 'rule2a', 'rule3a','rule4a', 'rule5a','rule8a','rule9a','rulea'];
            // Duyệt qua mảng và thiết lập thuộc tính checked cho mỗi quy tắc
            rulesToCheck.forEach(function(rule) {
                document.getElementById(rule).checked = true;
            });
        }
        else if (selectedRole === '3') {
            var rulesToCheck = ['rule0a','rule1a', 'rule2a', 'rule3a','rule4a', 'rule5a', 'rule6a','rule7a', 'rule8a','rule9a','rulea'];
            rulesToCheck.forEach(function(rule) {
                document.getElementById(rule).checked = false;
            });
            var rulesToCheck = ['rule8a','rulea'];
            // Duyệt qua mảng và thiết lập thuộc tính checked cho mỗi quy tắc
            rulesToCheck.forEach(function(rule) {
                document.getElementById(rule).checked = true;
            });
        }   
        else if (selectedRole === '4') {
            var rulesToCheck = ['rule0a','rule1a', 'rule2a', 'rule3a','rule4a', 'rule5a', 'rule6a','rule7a', 'rule8a','rule9a','rulea'];
            rulesToCheck.forEach(function(rule) {
                document.getElementById(rule).checked = false;
            });
            var rulesToCheck = ['rule9a','rulea'];
            // Duyệt qua mảng và thiết lập thuộc tính checked cho mỗi quy tắc
            rulesToCheck.forEach(function(rule) {
                document.getElementById(rule).checked = true;
            });
        }
    });

//Xóa nhân viên
    // Sử dụng lớp chung cho tất cả nút "Delete"
    document.querySelectorAll('#delete-member-btn').forEach(function(button) {
        button.addEventListener('click', function () {
            // Lấy user ID từ thuộc tính data-user-id
            var userId2 = this.getAttribute('data-user-id');
            // Gửi yêu cầu Ajax đến Laravel route để lấy dữ liệu
            fetch('/admin/staff/api/getdetail/' + userId2) // Thay thế đường dẫn phù hợp với route của bạn
                .then(response => response.json())
                .then(data => {
                    // Hiển thị dữ liệu lấy được trong modal
                    document.getElementById('member-name').innerText = 'Xóa thành viên ' + data.name + ' ?';

                    
                    //Xử lí khi bấm xác nhận xóa
                    var delete_submit = document.getElementById('delete-member-submit'); //
                    delete_submit.addEventListener('click',  function(){
                        var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                        fetch('/admin/staff/delete-staff/' + userId2,{
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                            },
                        })
                            .then(response => response.json())
                            .then(data =>{
                                location.href = location.href;
                            })
                    })
                })
                .catch(error => console.error('Error:', error));
        });
    }); 