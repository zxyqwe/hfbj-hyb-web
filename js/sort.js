function   JM_PowerList(colNum)   
  {   
  headEventObject=event.srcElement;   
  while(headEventObject.tagName!="TR")    
  {   
  headEventObject=headEventObject.parentElement;   
  }   
    
  for   (i=0;i<headEventObject.children.length;i++)   
  {   
  if   (headEventObject.children[i]!=event.srcElement) 
  {   
  headEventObject.children[i].className='listTableHead'; 
  }   
  }   
    
  var   tableRows=0;   
  trObject=clearStart.children[0].children; 
  for   (i=0;i<trObject.length;i++)   
  {   
  Object=clearStart.children[0].children[i];
  tableRows=(trObject[i].id=='ignore')?tableRows:tableRows+1;
  }   
    
  var   trinnerHTML=new   Array(tableRows);     
  var   tdinnerHTML=new   Array(tableRows);   
  var   tdNumber=new   Array(tableRows)   
  var   i0=0   
  var   i1=0   
  for   (i=0;i<trObject.length;i++)   
  {   
  if   (trObject[i].id!='ignore')   
  {   
  trinnerHTML[i0]=trObject[i].innerHTML;  
  tdinnerHTML[i0]=trObject[i].children[colNum].innerHTML;
  tdNumber[i0]=i;
  i0++;  
  }   
  }   
  sourceHTML=clearStart.children[0].outerHTML;
     
  for   (bi=0;bi<tableRows;bi++)   
  {   
  for   (i=0;i<tableRows;i++)   
  {   
  if(tdinnerHTML[i]>tdinnerHTML[i+1])   
  {   
  t_s=tdNumber[i+1];   
  t_b=tdNumber[i];   
  tdNumber[i+1]=t_b;   
  tdNumber[i]=t_s;   
  temp_small=tdinnerHTML[i+1];   
  temp_big=tdinnerHTML[i];   
  tdinnerHTML[i+1]=temp_big;   
  tdinnerHTML[i]=temp_small;   
  }   
  }   
  }   
    
    
    
  var   showshow='';   
  var   numshow='';   
  for   (i=0;i<tableRows;i++)   
  {   
  showshow=showshow+tdinnerHTML[i]+' ';  
  numshow=numshow+tdNumber[i]+'|';             
  }   
    
  sourceHTML_head=sourceHTML.split("<TBODY>");  
    
  numshow=numshow.split("|");   
  var   trRebuildHTML='';   
  if   (event.srcElement.className=='listHeadClicked')   
  {  
  for   (i=0;i<tableRows;i++)   
  {   
  trRebuildHTML=trRebuildHTML+trObject[numshow[tableRows-1-i]].outerHTML;
    
  }   
  event.srcElement.className='listHeadClicked0';   
  }   
  else   
  {
  for   (i=0;i<tableRows;i++)   
  {   
  trRebuildHTML=trRebuildHTML+trObject[numshow[i]].outerHTML;   
  }   
  event.srcElement.className='listHeadClicked';   
  }   
     
  var   DataRebuildTable='';   
  
  DataRebuildTable   =   "<table   border=1 width=100%  cellpadding=1 cellspacing=1 id='clearStart'><TBODY>"   +   trObject[0].outerHTML   +   trRebuildHTML   +   "</TBODY>"   +     
    
  "</table>";   
  clearStart.outerHTML=DataRebuildTable;
    
  } 