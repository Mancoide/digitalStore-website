import{_ as k,c as d,w as t,r as a,o as n,a as o,f as _,i as f,F as v}from"./app.06d20473.js";const g={props:{permissions:Object,formData:Object,definitions:Object}};function y(w,l,e,j,B,F){const c=a("v-text-field"),s=a("v-col"),i=a("v-row"),b=a("v-divider"),V=a("v-checkbox"),x=a("v-card"),D=a("v-card-text");return n(),d(D,null,{default:t(()=>[o(i,{class:"mb-3"},{default:t(()=>[o(s,{cols:"12",md:"4"},{default:t(()=>[o(c,{"error-messages":e.formData.errors.name,modelValue:e.formData.name,"onUpdate:modelValue":l[0]||(l[0]=r=>e.formData.name=r),color:"primary",label:"Nombre"},null,8,["error-messages","modelValue"])]),_:1}),o(s,{cols:"12",md:"8"},{default:t(()=>[o(c,{"error-messages":e.formData.errors.description,modelValue:e.formData.description,"onUpdate:modelValue":l[1]||(l[1]=r=>e.formData.description=r),color:"primary",label:"Descripci\xF3n"},null,8,["error-messages","modelValue"])]),_:1})]),_:1}),o(i,null,{default:t(()=>[(n(!0),_(v,null,f(e.permissions,(r,u)=>(n(),d(s,{cols:"12",md:"6",key:u},{default:t(()=>[o(x,{title:e.definitions[u]},{default:t(()=>[o(b),(n(!0),_(v,null,f(r,m=>(n(),d(V,{key:m.id,label:m.display_name,modelValue:e.formData.permissions,"onUpdate:modelValue":l[2]||(l[2]=p=>e.formData.permissions=p),value:m.id},null,8,["label","modelValue","value"]))),128))]),_:2},1032,["title"])]),_:2},1024))),128))]),_:1})]),_:1})}const U=k(g,[["render",y]]);export{U as default};
