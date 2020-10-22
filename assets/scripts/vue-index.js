new Vue({
    el: '#root-vue',
    data() { 
        return {
            message: 'AAAA',
            artikli: [],
            loading: true,
            hidden: true,
        }
    },
    methods: {
        refreshData: function (data){
            artikli = data;
        }
    }, 
    beforeCreate: function() {
        let self = this;
     
        axios.get('http://localhost/PHPMVC/home/getData')
        .then(function(response){         
            self.artikli = response.data;
            self.loading = false
        })
        .catch(function(error){
        });


        setInterval(function() {
            axios.get('http://localhost/PHPMVC/home/getData')
                .then(function(response){         
                    self.artikli = response.data;
                    self.loading = false;
                    console.log("BLAA");
                    
                })
        },10000)
    }
  })
  
