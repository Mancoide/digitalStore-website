import{_ as c,f as l,b as s,a as t,g as i,r as m,o as d}from"./app.360d8a91.js";const u={props:{formData:Object,statuses:Object}},_={class:"card-body"},f={class:"row mb-3"},V={class:"form-group col-md-8"},v={class:"form-group col-md-4"},b={key:0,class:"row"},g={class:"form-group col-md-12"};function D(x,o,e,y,N,E){const r=m("v-text-field"),n=m("v-select");return d(),l("div",_,[s("div",f,[s("div",V,[t(r,{"error-messages":e.formData.errors.name,modelValue:e.formData.name,"onUpdate:modelValue":o[0]||(o[0]=a=>e.formData.name=a),color:"primary",label:"Nombre",placeholder:"Escriba el Nombre del Plan."},null,8,["error-messages","modelValue"])]),s("div",v,[t(r,{"error-messages":e.formData.errors.cost,modelValue:e.formData.cost,"onUpdate:modelValue":o[1]||(o[1]=a=>e.formData.cost=a),color:"primary",label:"Costo",placeholder:"Ej.: $10"},null,8,["error-messages","modelValue"])])]),e.statuses?(d(),l("div",b,[s("div",g,[t(n,{"error-messages":e.formData.errors.status_id,color:"primary",label:"Estado",modelValue:e.formData.status_id,"onUpdate:modelValue":o[2]||(o[2]=a=>e.formData.status_id=a),items:e.statuses,"item-title":"name","item-value":"id"},null,8,["error-messages","modelValue","items"])])])):i("",!0)])}const j=c(u,[["render",D]]);export{j as default};