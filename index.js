import CartView from './modules/cartView.js';
var cartView=new CartView(); 

      
let addBtns=document.getElementsByClassName('cart_btn');    
for (let i = 0; i < addBtns.length; i++) 
{
    addBtns[i].addEventListener('click',function()
    {
        let data=this.getAttribute('data');             
        data=JSON.parse(data);
        if(data.action=='add')
        {
            data.value=document.getElementById('product_add_input_'+data.product_id).value;
            document.getElementById('product_add_input_'+data.product_id).value=1; 
        } 
        cartEdit(data);               
    });        
} 
let inputBtns=document.getElementsByClassName('cart_input');    
for (let i = 0; i < inputBtns.length; i++) 
{
    inputBtns[i].addEventListener('change',function()
    {
        let data=this.getAttribute('data');             
        data=JSON.parse(data);
        data.value=this.value;
        cartEdit(data);               
    });        
} 
if(document.getElementById('show_summary_btn'))
{
    document.getElementById('show_summary_btn').addEventListener('click',()=>
    {
        cartView.showDetails();
    });   
}


function cartEdit(data)
{
        document.getElementById('main_loader').style.visibility='visible';
        let dataXhr=new FormData();
        for(var k in data)
        {
                dataXhr.append(k,data[k]);
        }
        let xhr=new XMLHttpRequest();
        xhr.onreadystatechange = function()
        {                                
                if(this.readyState == 4 && this.status == 200)
                {
                    cartView.makeChanges(JSON.parse(this.response),data);
                    document.getElementById('main_loader').style.visibility='hidden';
                } 
        };  
        xhr.open('POST',mainLink+'control/cart_controller.php',true);
        xhr.send(dataXhr);
}
