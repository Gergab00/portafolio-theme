!function(){"use strict";var e,t={138:function(){var e=window.wp.element,t=window.wp.blocks,o=window.wp.blockEditor,n=(window.wp.i18n,window.wp.components);const r=["core/columns","core/column","core/heading","core/paragraph","core/list"],l=[["core/columns",{className:"row w-100"},[["core/column",{className:"col-sm-4 d-flex align-items-center"},[["core/heading",{level:2,className:"fs-54 text-light",placeholder:"Enter your Title...",content:"About Me"}]]],["core/column",{className:"col-sm-8 text-light"},[["core/paragraph",{}]]]]]];var c=JSON.parse('{"u2":"portafolio-theme/about-block"}');(0,t.registerBlockType)(c.u2,{edit:function(t){let{attributes:c,setAttributes:a}=t;return(0,e.createElement)("div",(0,o.useBlockProps)(),(0,e.createElement)(n.Panel,{header:"About Block"},(0,e.createElement)(n.PanelBody,{title:"My Block Settings",opened:!0,className:"bg-dark"},(0,e.createElement)(n.PanelRow,null,(0,e.createElement)(o.InnerBlocks,{allowedBlocks:r,template:l})))))},save:t=>(0,e.createElement)(o.InnerBlocks.Content,null)})}},o={};function n(e){var r=o[e];if(void 0!==r)return r.exports;var l=o[e]={exports:{}};return t[e](l,l.exports,n),l.exports}n.m=t,e=[],n.O=function(t,o,r,l){if(!o){var c=1/0;for(u=0;u<e.length;u++){o=e[u][0],r=e[u][1],l=e[u][2];for(var a=!0,i=0;i<o.length;i++)(!1&l||c>=l)&&Object.keys(n.O).every((function(e){return n.O[e](o[i])}))?o.splice(i--,1):(a=!1,l<c&&(c=l));if(a){e.splice(u--,1);var s=r();void 0!==s&&(t=s)}}return t}l=l||0;for(var u=e.length;u>0&&e[u-1][2]>l;u--)e[u]=e[u-1];e[u]=[o,r,l]},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){var e={244:0,892:0};n.O.j=function(t){return 0===e[t]};var t=function(t,o){var r,l,c=o[0],a=o[1],i=o[2],s=0;if(c.some((function(t){return 0!==e[t]}))){for(r in a)n.o(a,r)&&(n.m[r]=a[r]);if(i)var u=i(n)}for(t&&t(o);s<c.length;s++)l=c[s],n.o(e,l)&&e[l]&&e[l][0](),e[l]=0;return n.O(u)},o=self.webpackChunkPortafolio_Theme=self.webpackChunkPortafolio_Theme||[];o.forEach(t.bind(null,0)),o.push=t.bind(null,o.push.bind(o))}();var r=n.O(void 0,[892],(function(){return n(138)}));r=n.O(r)}();