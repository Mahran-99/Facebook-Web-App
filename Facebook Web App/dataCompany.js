var myAnimation = new hoverEffect({
        parent: document.querySelector('.profile-img'),
        intensity: 0.3,
        image1: "imgs/pexels-alexander-krivitskiy-1623061.jpg",
        image2: color,
        displacementImage: 'imgs/heightMap.png'
    });


const openPostForm=document.querySelector(".posts-form-open");
const postPopupBackground=document.querySelector(".post-popup-background");
const postPopup=document.querySelector(".post-popup");
const body=document.querySelector("body");
openPostForm.addEventListener("click",()=>{
    
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

//attach img
let imgPath="";
let imgPath2;
const imgAttach=document.querySelector(".post-img-attach");
imgAttach.addEventListener("change",(e)=>{
imgPath=e.target.value;
imgPath2=imgPath.split(`C:\\fakepath\\`).join('');

});




//attach post
const postBtn=document.querySelector(".post-btn");
const writePostForm=document.querySelector(".write-post-form");
const postsSection=document.querySelector(".profile-posts");
let dummy="";
postBtn.addEventListener("click",(e)=>{
    
   dummy=writePostForm.value;
    
    if(dummy==="")
        {
            alert("nothing to post");
        }
    else
        {
           const postDiv=document.createElement("div");
           const postP=document.createElement("p");
            const postPP=document.createElement("img");
            const postName=document.createElement("span");
            const postImg=document.createElement("img");
            postImg.src=`${"imgs/"+imgPath2}`;
            postImg.classList.add("post-img")
            console.log(postImg);
            postName.innerText=`Name: ${name}`;
            postP.innerText=dummy;
            postPP.src=color;
            postPP.classList.add("posts-pp");
            postName.classList.add("post-name");
            postDiv.appendChild(postPP);
            postDiv.appendChild(postName);
            postDiv.appendChild(postP);
            postDiv.appendChild(postImg);
           
            postDiv.classList.add("posts-section-post");
            postsSection.appendChild(postDiv);
                postPopupBackground.style.display="none";
         postPopup.style.display="none";
         body.style.overflowY="auto";
            writePostForm.value="";

        }
    
});

const likedPeople=document.querySelector(".liked-people");
const peopleLikedPopupBackground=document.querySelector(".peopleLiked-popup-background");
const peopleLikedPopup=document.querySelector(".peopleLiked-popup");

likedPeople.addEventListener("click",()=>{
    
peopleLikedPopupBackground.style.display="flex";
peopleLikedPopup.style.display="block";
body.style.overflowY="hidden";
});


const peopleLikedCloseBtn=document.querySelector(".peopleLiked-close-btn");

peopleLikedCloseBtn.addEventListener("click",()=>{
    
    peopleLikedPopupBackground.style.display="none";
peopleLikedPopup.style.display="none";
   body.style.overflowY="auto";
});

