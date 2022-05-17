- Tạo 1 repository trên gitlab
- Tạo các nhánh sau: main, develop, hotfix, release
, feature_a1 trên gitlab
- Clone project về local / máy tính
Dùng command line để clone, giả sử lưu project ở ổ C. Các lệnh:
C:
cd \
git clone https://gitlab.com/nguyenvietmanhit/manhnv_gitlab.git
C:\>cd manhnv_gitlab
<!--- Tạo các nhánh sau: main, develop, hotfix, release-->
<!--Ko cần tạo nhánh main vì gitlab tự sinh ra nhánh main-->
<!-- tạo 3 nhánh develop, hotfix, release-->
<!--git branch -> liệt kê các branch đang có-->
<!--git checkout -b develop -> tạo nhánh develop r checkout sang-->
<!--git checkout -b hotfix -> tạo nhánh hotfix r checkout sang-->
<!--git checkout -b release -> tạo nhánh release r checkout sang-->
- Mỗi nhánh main, develop, hotfix, release phải có ít nhất
1 commit:
git checkout main
echo 'nhanh main' > main.html   -> tạo file
git status -> ktra trạng thái các file
git add main.html
git commit -m "Commit nhanh main"
git push origin main
# Làm tương tự cho các nhánh còn lại là develop, hotfix, release
- Các nhánh chức năng phải có ít nhất 2 commit:
Tạo ra 2 nhánh chức năng: feature_a và feature_b, thực hiện
tương tự như nhánh main, nhưng sẽ thao tác 2 lần để sinh ra
2 commit:
git checkout -b feature_a
echo 'nhanh feature_a dau tien' > feature_a1.html
git add feature_a1.html
git commit -m "nhanh feature_1 commit 1"
git fetch --all
- Confilict:
Checkout về nhánh develop
Checkout về nhánh hotfix
Cả 2 nhánh trên cùng tạo 1 file common.txt, sau đó cùng add,
commit, push file đó lên nhánh tương ứng
Mỗi nhánh sẽ tạo 1 merge request vào nhánh main
Giả sử develop sẽ tạo trc, hotfix tạo sau
Develop đc merge vào main trc, tuy nhiên do cả 2 nhánh
develop và hotfix đều đnag thực hiện tạo 1 file trùng tên và sửa
nội dung tùy ý cho file đó,
nên khi develop đc merge vào trc thì hotfix sẽ báo conflict