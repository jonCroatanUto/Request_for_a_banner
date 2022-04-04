# Request_for_a_banner

this is php server that request HTML code to an external API


## 🚀 to start

to start to ejecuting this code you should:

- to render the final response I use [MAMP](https://www.mamp.info/en/downloads/) as a local development enviroment:
  there is a lot of option to execute this code . If you want to use `MAMP` :
  - open the MAMP app
  - go inside htdoc folder
  - Ejecute the comand:

```
git clone https://github.com/jonCroatanUto/Request_for_a_banner.git
```

- now click Start on your `MAMP` interface.
- You can write in your browser the `localhost/Request_for_a_banner` to see the result

# 🦴 Project Structure

## Folder structure 🗂

<pre>  
├───.github             <i>// Github actions config files </i>
├───Input               <i>// the params we want to send </i>
├───Output              <i>// the response we get </i>
├───index.php           <i>// to render in a local enviroment </i>
└───Launcher.php        <i>// the main class we do here all the instance of the other class </i>
        └───Networks
             └───BaseClasse      <i>// the patern class of TappxClass, use to pass fixed params </i>
                 |
                 └───TappxClass  <i>// execute the Requeste and return the response </i>
                        |
                        └─--Methods   
                            ├───OutputClass   <i>// Generates a encoded JSON with the response given by the request, also render the banner</i>
                            └───ParseClass    <i>// Prepare the object params that we pass to the TappxClass</i>
</pre>

# 🖇️ Contributing

If you want to contribute, please fork the repository, create a new branch whit your contribution, and push the branch as a pull requests.
