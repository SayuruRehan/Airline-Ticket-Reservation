function ratingApp(){
    const HOVER_ON_STAR_CSS = 'star-hover';
    const CHECKED_STAR_CSS = 'star-checked';

    const getStars = (starsContainerId = 'feedback-rating') => {
        const starsDiv = document.getElementById(starsContainerId);
        return starsDiv.querySelectorAll('.fa-star');
    };

    const STARS = getStars(); //the stars in their initial state
    const NUM_OF_STARS = STARS.length;

    const isStarChecked = star => star.classList.contains(CHECKED_STAR_CSS);

    const getLastCheckedStarIndex = (stars) => {
        let lastCheckedStarIndex = -1; //no star is checked
        for(let i=0;i<NUM_OF_STARS;i++){
            if(isStarChecked(stars[i])){
                //the i-th star is the last checked star
                lastCheckedStarIndex = i;
            }
            else{
                //no more checked stars
                break;
            }
        }
        return lastCheckedStarIndex;
    };

    const getStarIndexFromEvent = (event) => {
        const {value} = event.target.attributes; //value is a custom attribute
        return Number(value.nodeValue);
    };

    const checkStars = (stars, start, stop) =>{
        /* adds the 'star-checked' css class to the given stars(elements),
        from the specified 'start' index
        to the specified 'stop' index (exclusive)*/
        for(let i=start;i<stop;i++){
            stars[i].classList.add(CHECKED_STAR_CSS);
        }
    }

    const unCheckStars = (stars, start=0, stop=NUM_OF_STARS) =>{
        /*removes the 'star-checked' css class from the given stars(elements),
        from the specified 'start' index
        to the specified 'stop' index (exclusive)*/
        for(let i=start;i<stop;i++){
            stars[i].classList.remove(CHECKED_STAR_CSS);
        }
    }
    const hoverStars = (stars, start, stop, callback)=>{
        for(let i=start;i<stop;i++){
            callback(stars[i]);
        }
    }
    const mouseOnStar = star => star.classList.add(HOVER_ON_STAR_CSS);
    const mouseOutStar = star => star.classList.remove(HOVER_ON_STAR_CSS);
    const reset = (stars =STARS)=>{
        unCheckStars(stars);
        hoverStars(stars,0,NUM_OF_STARS,mouseOutStar);
    }
    const starHoverEventHandler = (event, callback)=>{
        let stars = getStars();
        const lastCheckedStarIndex = getLastCheckedStarIndex(stars);
        const hoverOverIndex = getStarIndexFromEvent(event);
        if(!isStarChecked(stars[hoverOverIndex])){
            hoverStars(stars, lastCheckedStarIndex+1, hoverOverIndex+1, callback);
        }
    }
    const starClickEventHandler = (event)=>{
        //get the clicked star
        const stars = getStars();
        const clickedStarIndex = getStarIndexFromEvent(event);
        const lastCheckedStarIndex = getLastCheckedStarIndex(stars);

        if(isStarChecked(stars[clickedStarIndex])){
            if(clickedStarIndex<lastCheckedStarIndex){
                unCheckStars(stars,clickedStarIndex+1);
                hoverStars(stars, clickedStarIndex+1,NUM_OF_STARS,mouseOutStar);
            }
            else if(clickedStarIndex === lastCheckedStarIndex){
                unCheckStars(stars, 0);
            }
            else{
                checkStars(stars,lastCheckedStarIndex+1,clickedStarIndex+1);
            }
        }
        else{
            checkStars(stars,lastCheckedStarIndex+1,clickedStarIndex+1);
        }
    }

    STARS.forEach((star)=>{
        star.addEventListener('mouseover',(event)=>{
            starHoverEventHandler(event, mouseOnStar);
        });
        star.addEventListener('mouseout',(event)=>{
            starHoverEventHandler(event, mouseOutStar);
        });
        star.addEventListener('click', (event)=>{
            starClickEventHandler(event);
        });
    })
    return {
        getStars,
        getLastCheckedStarIndex,
        checkStars,
        reset
    }
}
const feedBackApp = ()=>{
    //rating
    const rating = ratingApp();
    //feedback
    const modal = document.getElementById('feedback-modal');
    const feedback = document.getElementById('feedback');
    const feedbackInModal = document.getElementById('user-feedback-message');
    const stars = rating.getStars();
    const starsInModal = rating.getStars('user-rating');

    //add toggle method to modal
    modal.toggleDisplay = ()=>{
        modal.hidden = !modal.hidden;
        modal.classList.toggle('d-flex');
    }

    const feedbackSubmitButton = document.getElementById('feedback-submit-btn');
    feedbackSubmitButton.addEventListener('click', ()=>{
        const lastCheckedStarIndex = rating.getLastCheckedStarIndex(stars);
        if(feedback.value !== ""){
            rating.checkStars(starsInModal,0,lastCheckedStarIndex+1);
            modal.toggleDisplay();
            feedbackInModal.innerText = feedback.value;
        }
    });
    const closeModalButton = document.getElementById('close-modal');

    closeModalButton.addEventListener('click',()=>{
        //empty textarea
        feedback.value = "";

        rating.reset(); //reset stars in form
        rating.reset(starsInModal);  //reset stars in modal

        //hide modal
        modal.toggleDisplay();

    });
}

feedBackApp();