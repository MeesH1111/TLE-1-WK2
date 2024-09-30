import { ImageSource, Sound, Resource, Loader } from 'excalibur'

// voeg hier jouw eigen resources toe
const Resources = {
    Test: new ImageSource('img/test.jpeg'),
    BackgroundStart: new ImageSource('img/bg.jpg'),
    BackgroundEnd: new ImageSource('img/bgGameOver.jpg'),
    ButtonDonate: new ImageSource('img/donatieknopgame.png'),

}
const ResourceLoader = new Loader()
for (let res of Object.values(Resources)) {
    ResourceLoader.addResource(res)
}

export { Resources, ResourceLoader }