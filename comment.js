
const openComment=document.querySelector(".comment");
const postPopupBackground=document.querySelector(".post-popup-background");
const postPopup=document.querySelector(".post-popup");
const body=document.querySelector("body");


openComment.addEventListener("click",()=>{
    
postPopupBackground.style.display="flex";
postPopup.style.display="block";
body.style.overflowY="hidden";
});

const closePostForm=document.querySelector(".close-btn");

closePostForm.addEventListener("click",()=>{
    
    postPopupBackground.style.display="none";
postPopup.style.display="none";
   body.style.overflowY="auto";
});




let commentValue="";
const commentInput=document.querySelector(".add-comment");
const addingComment=document.querySelector(".comment-adding");
const commentsDiv=document.querySelector(".comments");
addingComment.addEventListener("click",()=>{
    
    commentValue=commentInput.value;
    console.log(commentValue);
   
     if(commentValue==="")
        {
            alert("nothing to add");
        }
    else
        {
            const commentText=document.createElement("p");
            commentText.innerText=commentValue;
            commentsDiv.appendChild(commentText);
            commentInput.value="";
    
        }
});

const like=document.querySelector(".like-post");
const likeContent=document.querySelector(".likes-content");

like.addEventListener("click",()=>{
    
   if(like.classList.contains("like-color"))
       {
           likeContent.innerText="0";
           like.classList.remove("like-color");
       }
    else
        {
            
            like.classList.add("like-color");
            likeContent.innerText="1";
        }
});