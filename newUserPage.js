document.addEventListener("DOMContentLoaded", function(){
    console.log("Hello")
    
    view=this.getElementById("viewPage").addEventListener("click",function(){
        
        var xhr = new XMLHttpRequest();
    
    
        xhr.open('GET', 'viewUserPage.php', true);
    
    
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                
                document.getElementById('notSideBar').innerHTML = xhr.responseText;
            }
        };
    
    
        xhr.send();
    })
    
    
    
    home=this.getElementById("homePage").addEventListener("click",function(){
        
        var xhr = new XMLHttpRequest();
    
    
        xhr.open('GET', 'newUserPage.php', true);
    
    
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                
                document.getElementById('notSideBar').innerHTML = xhr.responseText;
            }
        };
    
    
        xhr.send();
    })
    
    
    
    logout=this.getElementById("logOutPage").addEventListener("click",function(){
        console.log("logout")
        var xhr = new XMLHttpRequest();
    
    
        xhr.open('GET', 'viewUserPage.php', true);
    
    
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                
                document.getElementById('notSideBar').innerHTML = xhr.responseText;
            }
        };
    
    
        xhr.send();
    })
    
    
    
    Newcontact=this.getElementById("newContactPage").addEventListener("click",function(){
        
        var xhr = new XMLHttpRequest();
    
    
        xhr.open('GET', 'newUserPage.php', true);
    
    
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                
                document.getElementById('notSideBar').innerHTML = xhr.responseText;
            }
        };
    
    
        xhr.send();
    })
    }); 