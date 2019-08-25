module.exports = function (user,repo,skip_readme) {

const fetch = require('node-fetch');

   return new Promise(function(resolve, reject) {
    fetch(`https://api.github.com/repos/${user}/${repo}/git/trees/master?recursive=1`)
    .catch(error => reject(Error(error)))
      .then(response => response.json())
      .then(function(myjson) {
    var resp = myjson;
    var tree = resp["tree"];
    var result = {};

      for (var key in tree) {
       var ar = tree[key];
     var typ = ar["type"];
     var s_p = ar["path"];
    
     if (typ == "tree") {
      result[s_p] = {};
        continue;
        

     }
     if ((s_p =="README.md") && (skip_readme)) {
    
   
        continue;
     }
     if (!s_p.includes("/")) {
        link = encodeURI('https://raw.githubusercontent.com/'+user+'/'+repo+'/master/'+s_p);
        result[s_p] = link;
        continue;
     }
     var p_ar = s_p.split("/");
     var filename = p_ar.pop();
     var dir = p_ar.join("/");

     
     link = 'https://raw.githubusercontent.com/'+user+'/'+repo+'/master/'+s_p;
     result[dir][filename] = link
    
    }
    resolve(result);
   });
  
      });
    }
