class CartView
{
        addProduct(product_id)
        {
                document.getElementById('product_shop_module_'+product_id).classList.add('product_added');
        }
        changeCounters(quant)
        {
                let counters=document.getElementsByClassName('counter_cart_btn'); 
                for (let i = 0; i < counters.length; i++) 
                {
                    counters[i].innerHTML=quant;
                };
        }       
        changeProductQuant(product_id,quant)
        {
                let quants=document.getElementsByClassName('quant_'+product_id); 
                for (let i = 0; i < quants.length; i++) 
                {
                    quants[i].value=quant;
                    quants[i].innerHTML=quant;
                };        
        }
        changeProductTotal(product_id,total)
        {
                let totals=document.getElementsByClassName('total_'+product_id); 
                for (let i = 0; i < totals.length; i++) 
                {
                    totals[i].innerHTML='€ '+total+'.-';;
                };        
        }        
        changeCartTotal(total)
        {
                let totals=document.getElementsByClassName('total_cart_price'); 
                for (let i = 0; i < totals.length; i++) 
                {
                    totals[i].innerHTML='€ '+total+'.-';
                };
        } 
        removeProduct(product_id)
        {
                let products =Array.prototype.slice.call(document.getElementsByClassName('product_'+product_id), 0);            
                for (let i = 0; i < products.length; i++) 
                {
                    products[i].remove();
                };
        }
        removeAllProducts()
        {
                let products =Array.prototype.slice.call(document.getElementsByClassName('cart_product_module'), 0);            
                for (let i = 0; i < products.length; i++) 
                {
                    products[i].remove();
                }; 
        }
        showDetails()
        {
                let elem=document.querySelector('#summary_container .summary');
                let arrow=document.querySelector('#summary_container .arrow_show_summary');
                let elemStyle=window.getComputedStyle(elem);
                let bottom=parseInt(elemStyle.getPropertyValue('bottom').replace('px',''));
                bottom<0 ? elem.style.bottom='0' : elem.style.bottom='-440px'
                bottom<0 ? arrow.style.transform='rotate(180deg)' : arrow.style.transform='rotate(0deg)'
        }
        makeChanges(cart,data)
        {
                switch (data.action) 
                {
                        case 'add':
                            this.addProduct(data.product_id);
                        case 'increase':
                        case 'decrease':
                        case 'change_quantity':
                            this.changeCounters(cart.total_quant);
                            this.changeCartTotal(cart.total);
                            this.changeProductQuant(data.product_id,eval('cart.products.'+data.product_id+'.quant')); 
                            this.changeProductTotal(data.product_id,eval('cart.products.'+data.product_id+'.total'))                   
                        break;
                        case 'remove_product' :
                            this.changeCounters(cart.total_quant);
                            this.changeCartTotal(cart.total);
                            this.removeProduct(data.product_id);
                        break;
                        case 'cart_reset' :                
                            this.changeCounters(cart.total_quant);
                            this.changeCartTotal(cart.total);
                            this.removeAllProducts();
                        break;
                }
        }
} 

export default CartView;