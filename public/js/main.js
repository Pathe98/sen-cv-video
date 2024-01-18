const forms = document.querySelectorAll('#form-js');

forms.forEach(form=> {
    form.addEvenListener('submit', function(e) {
        e.preventDefault();

        const url = this.getAttribute('action');
        const token =document.querySelector('meta[name="csrf-token"]').content;
        const postId=this.querySelector("#post-id-js").value;
        const count=this.querySelector('#count-js');
        
        fetch(url, {
            headers: {
                "Content-type":"application/json",
                'X-CSRF':token
            },
            method: 'post',
            body:JSON.stringify({
                id: postId
            })

        }).then(response =>{
            response.json().then(date=> {
                count.innerHTML = data.count;

            })
           
        }).catch( error =>{
            console.log(error)

        })

    });
});