
<html>
    <body>
    
    <h2>Sentiment test</h2>
    
    <form method="POST" action="{{ url('result') }}" >
    @csrf 
      <label>Write a review:</label><br>
      <textarea id="review" name="review" rows="4" cols="50">
      
      </textarea>
    
      <br><br>
      <button type="submit" class="btn btn-primary">Submit</button>
      <br><br>
      
    </form> 
    
        
    </body>
</html>