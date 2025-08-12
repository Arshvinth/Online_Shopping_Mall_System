

// Firebase web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyAttHeQgI_ytS2ATZ1Aa71dHyBpBJ1wB0o",
    authDomain: "shoppingmall-e5db4.firebaseapp.com",
    projectId: "shoppingmall-e5db4",
    storageBucket: "shoppingmall-e5db4.appspot.com",
    messagingSenderId: "120829851555",
    appId: "1:120829851555:web:6fc7ed9c54f620890f8c16",
    measurementId: "G-5G0HWWKJW3"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

function uploadImage() {
    const ref = firebase.storage().ref();
    const file = document.querySelector("#content_image").files[0];
    const name = +new Date() + "-" + file.name;
    const metadata = {
        contentType: file.type
    };
    const task = ref.child(name).put(file, metadata); task
        .then(snapshot => snapshot.ref.getDownloadURL())
        .then(url => {
            console.log(url);
            alert('image uploaded successfully');
            document.getElementById("downloadableURL").innerHTML = url;
        })
        .catch(console.error);
}