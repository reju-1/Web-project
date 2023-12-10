document.getElementById('postForm').addEventListener('submit', async function (e) {

    // e.preventDefault();
    const post = document.getElementById('postData').value;
    if (post === '' || /^\s*$/.test(post)) {
        alert('Please enter valid content in the post.');
        return;
    }
    const postObj = { content: post }

    const apiUrl = 'http://localhost/Web-project/pages/model/save_post.php'
    try {

        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(postObj)

        });

        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }

        const data = await response.json();
        // console.log('API Response: ', data);

    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
    }
});